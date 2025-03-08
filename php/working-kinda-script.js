let currentOffset = 0;
const limit = 10; // Number of posts per request

function sortPostsByTime(posts) {
    return posts.sort((a, b) => new Date(b.time) - new Date(a.time)); // Newest first
}

function renderPosts(posts) {
    // Sort posts first
    const sortedPosts = sortPostsByTime(posts);

    // Loop through the sorted posts and render them
    sortedPosts.forEach(post => {
        const postSummaryHTML = post_summary(post);
        // Assuming you have a container with the id 'posts-container' to hold the posts
        document.getElementById('posts-container').innerHTML += postSummaryHTML;
    });
}

// Function to load posts from the server
function loadPosts() {
    fetch(`get_news_feed.php?lim=${limit}&offset=${currentOffset}`)
        .then(response => response.json()) // Assume the server returns JSON
        .then(data => {
            const newsFeedContainer = document.getElementById('news-feed');
            data.posts.forEach(post => {
                const postHTML = post_summary(post);  // Call the PHP-generated post summary function
                newsFeedContainer.insertAdjacentHTML('beforeend', postHTML);
            });
            
            // Update the offset for the next request
            currentOffset += limit;
        })
        .catch(error => console.error('Error fetching posts:', error));
}

// Function to display post summaries
function post_summary(post) {
    console.log("Post Data:", post); // Debugging line

    // Ensure 'society' exists in the post object and use it
    const sname = post.society || "default_society"; // Default fallback if 'society' is undefined

    return `
        <div class="post-summary" id="post-${post.post_id}">
            <div class="post-thumbnail">
                <img src="${post.image_location ? '../' + post.image_location : '../uploads/style/no_thumb_loaded.PNG'}" alt="Thumbnail">
            </div>
            <div class="post-details">
                <!-- Wrap the title itself in the anchor tag -->
                <h4><a href="../post.php?pid=${post.post_id}&soc=${sname}" class="post-title">${post.title}</a> (${post.votes > 0 ? "+" : ""}${post.votes})</h4>
                <small>Submitted by ${post.username} on ${post.time} ${post.society ? 'to ' + post.society : ''}</small>
                <div class="comments-count">${post.comments} comments</div>
            </div>
            <div class="vote-buttons" id="post-vote-buttons-${post.post_id}">
                ${generateVoteButtons(post)}
            </div>
        </div>
        <hr class="border-0 border-b-sm border-solid border-b-neutral-border-weak">
    `;
}



// Generates the vote buttons with the current vote status
function generateVoteButtons(post) {
    let upvoteClass = post.vote === 'UP' ? ' upvote-active' : '';
    let downvoteClass = post.vote === 'DOWN' ? ' downvote-active' : '';
    
    return `
        <div class="vote-group" role="group">
            <button class="post-upvote${upvoteClass}" id="post-up-${post.post_id}" onclick="vote(${post.post_id}, 'UP')">
                &#x2191; Upvote
            </button>
            <button class="post-downvote${downvoteClass}" id="post-down-${post.post_id}" onclick="vote(${post.post_id}, 'DOWN')">
                &#x2193; Downvote
            </button>
        </div>
    `;
}
function vote(postId, voteType) {
    // Send the vote request to the server
    fetch('vote.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            post_id: postId,
            vote: voteType
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // If the vote was successful, update the UI
            updateVoteCount(postId, voteType);
        } else {
            console.log('Vote failed');
        }
    })
    .catch(error => console.error('Error voting:', error));
}

function updateVoteCount(postId, voteType) {
    // Get the post summary element by postId
    const postElement = document.getElementById(`post-${postId}`);
    const votesElement = postElement.querySelector('h4');
    let currentVotes = parseInt(votesElement.innerText.match(/\(([-+]?\d+)\)/)[1]);

    // Update the vote count
    if (voteType === 'UP') {
        currentVotes++;
    } else if (voteType === 'DOWN') {
        currentVotes--;
    }

    // Update the vote count in the UI
    votesElement.innerText = `${votesElement.innerText.split('(')[0]} (${currentVotes})`;
}


// Load initial posts
loadPosts();

// Load more posts when the button is clicked
function loadMorePosts() {
    loadPosts();
}
// Function to load the header from header.html
function loadHeader() {
    fetch("header.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header-container").innerHTML = data;
        })
        .catch(error => console.error("Error loading header:", error));
}

// Run the function when the page loads
document.addEventListener("DOMContentLoaded", loadHeader);

function toggleDarkMode() {
    let body = document.body;
    body.classList.toggle("dark-mode");

    // Save the user's preference
    if (body.classList.contains("dark-mode")) {
        localStorage.setItem("darkMode", "enabled");
    } else {
        localStorage.setItem("darkMode", "disabled");
    }
}

// Function to check user preference on page load
function checkDarkMode() {
    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
    }
}

// Run the function when the page loads
document.addEventListener("DOMContentLoaded", checkDarkMode);

document.addEventListener("DOMContentLoaded", function () {
    updateLoginButton();
});

function toggleLoginForm() {
    let modal = document.getElementById("login-modal");
    modal.style.display = modal.style.display === "block" ? "none" : "block";
}

function handleLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (!username || !password) {
        alert("Please enter both username and password.");
        return;
    }

    // Send login data to PHP
    fetch("login.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            localStorage.setItem("loggedInUser", username);
            alert("Login successful!");
            toggleLoginForm();
            updateLoginButton();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}

function handleLogout() {
    localStorage.removeItem("loggedInUser");
    fetch("logout.php"); // Optional, to destroy PHP session
    updateLoginButton();
}

function updateLoginButton() {
    let loginBtn = document.getElementById("login-btn");
    let user = localStorage.getItem("loggedInUser");

    if (user) {
        loginBtn.textContent = "Logout";
        loginBtn.onclick = handleLogout;
    } else {
        loginBtn.textContent = "Login";
        loginBtn.onclick = toggleLoginForm;
    }
}


