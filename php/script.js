let currentOffset = 0;
const limit = 50; // Number of posts per request
let currentSort = 'date'; // Default sorting by votes



// Create the sorting dropdown
document.addEventListener("DOMContentLoaded", function() {
    const sortingContainer = document.getElementById('sorting-container');
     if (!sortingContainer) {
        console.error("Error: 'sorting-container' element not found.");
        return;
    } else {
        console.log("");
    }
    
   setTimeout(() => {
    sortingContainer.innerHTML = `
        <label for="sortSelector" style="color: white;">Sort by: </label>
        <select id="sortSelector">
            <option value="votes">Most Upvoted</option>
            <option value="date">Newest</option>
        </select>
    `;
}, 10); // Wait 500ms

    document.getElementById('sortSelector').addEventListener('change', function(event) {
        currentSort = event.target.value;
        currentOffset = 0; // Reset offset when changing sort order
        loadPosts(); // Reload posts based on selected sorting
    });

    loadPosts(); // Load posts initially
});

function reformatDate(dateString) {
    return dateString.replace(' ', 'T');
}

function sortPostsByTime(posts) {
    return posts.sort((a, b) => {
        const timeA = new Date(reformatDate(a.time));
        const timeB = new Date(reformatDate(b.time));

        if (isNaN(timeA) || isNaN(timeB)) {
            return 0; // Keep original order if date is invalid
        }

        return timeB - timeA; // Newest first
    });
}

function renderPosts(posts) {
    if (!Array.isArray(posts)) {
        console.error('Posts should be an array');
        return;
    }

    const postsContainer = document.getElementById('news-feed');
    if (!postsContainer) {
        console.error('Posts container element not found');
        return;
    }

    postsContainer.innerHTML = ""; // Clear previous posts

    posts.forEach(post => {
        const postSummaryHTML = post_summary(post);
        postsContainer.insertAdjacentHTML('beforeend', postSummaryHTML);
    });
}

function loadPosts() {
    fetch(`get_news_feed.php?lim=${limit}&offset=${currentOffset}&sort_by=${currentSort}`)
        .then(response => response.json())
        .then(data => {
            if (currentSort === 'date') {
                data.posts = sortPostsByTime(data.posts); // Ensure sorting when needed
            }

            renderPosts(data.posts);
            currentOffset += limit;
        })
        .catch(error => console.error('Error fetching posts:', error));
}

function post_summary(post) {
    const postId = post.post_id || "unknown";
    const society = post.society || "default_society";
    const imageLocation = post.image_location;
    
    let imageSrc = '../uploads/style/no_thumb_loaded.PNG';

    if (imageLocation && imageLocation.toLowerCase().endsWith('.mp4')) {
        imageSrc = generateVideoThumbnail(imageLocation);
    } else if (imageLocation && imageLocation.toLowerCase().includes('iframe')) {
        imageSrc = generateIframeThumbnail(imageLocation);
    } else if (imageLocation) {
        imageSrc = `../${imageLocation}`;
    }

    return `
        <div class="post-summary" id="post-${postId}"  onclick="togglePostContent(${postId}, '${society}')" >
            <div class="post-thumbnail">
                <img src="${post.thumbnail_location ? '../' + post.thumbnail_location : '../uploads/style/no_thumb_loaded.PNG'}" 
                     alt="Thumbnail">
            </div>

            <div class="post-details" >
                <span class="post-title" 
                      id="${postId}" 
                      
                      style="cursor: pointer;  text-decoration: auto;">
                    ${post.title}
                </span>
                <small>Submitted by ${post.username} on ${post.time} ${post.society ? 'to ' + post.society : ''}</small>

                <div class="vote-buttons" id="post-vote-buttons-${postId}">
                    ${generateVoteButtons(post)}
                </div>

                <div class="comments-count">${post.comments} comments</div>
            </div>

            <div id="post-content-${postId}" class="post-content">
                <em></em>
            </div>
        </div>
        <hr class="post-feed">
    `;
}


// Function to generate a thumbnail for an MP4 video
function generateVideoThumbnail(videoSrc, existingThumbnail) {
    // If a thumbnail already exists, return it
    if (existingThumbnail) {
        return existingThumbnail;
    }

    // Create a temporary video element to extract a thumbnail
    const video = document.createElement('video');
    video.src = `../${videoSrc}`;
    video.load();
    video.currentTime = 1;  // Seek to the 1-second mark

    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    video.onloadeddata = function () {
        video.onseeked = function () {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            const thumbnailDataUrl = canvas.toDataURL();
            // Return the thumbnail image URL
            return thumbnailDataUrl;
        };
    };
    return '../uploads/style/default_video_thumbnail.jpg'; // Temporary fallback
}

// Function to generate a thumbnail for an iframe (e.g., YouTube or Vimeo)
function generateIframeThumbnail(iframeSrc, existingThumbnail) {
    // If a thumbnail already exists, return it
    if (existingThumbnail) {
        return existingThumbnail;
    }
    
    if (iframeSrc.includes('youtube.com')) {
        return 'https://img.youtube.com/vi/VIDEO_ID/maxresdefault.jpg'; // Replace VIDEO_ID dynamically
    } else if (iframeSrc.includes('vimeo.com')) {
        return 'https://vumbnail.com/VIDEO_ID.jpg'; // Replace VIDEO_ID dynamically
    }
    return '../uploads/no_thumb_loaded.png'; // Default fallback for iframe content
}

function generateVoteButtons(post) {
    // Make an AJAX call to get the user's vote
    fetch('vote.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ post_id: post.post_id })
    })
    .then(response => response.json())
    .then(data => {
        let userVote = data.userVote; // Get the vote returned by the server
        let upvoteClass = userVote === 'UP' ? ' upvote-active' : '';
        let downvoteClass = userVote === 'DOWN' ? ' downvote-active' : '';

        // Generate the vote buttons with SVGs
        const voteButtonsHtml = `
        <span class="pill-box">
            <div class="vote-group" role="group">
                <button class="post-upvote${upvoteClass}" id="post-up-${post.post_id}" onclick="vote(${post.post_id}, 'UP')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="green" stroke-width="2">
  <path d="M2 10H5V22H2V10Z" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22 10.5C22 9.67 21.33 9 20.5 9H14.69L15.64 5.34C15.78 4.79 15.64 4.21 15.26 3.79L13.4 1.6L8 7V20H18.5C19.33 20 20.06 19.45 20.29 18.66L22 12.66V10.5Z" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    
                </button>
                <H4 class="vote-count">${post.votes > 0 ? "+" : ""}${post.votes} </H4>
                <button class="post-downvote${downvoteClass}" id="post-down-${post.post_id}" onclick="vote(${post.post_id}, 'DOWN')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="red" stroke-width="2">
  <path d="M2 2H5V14H2V2Z" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22 13.5C22 14.33 21.33 15 20.5 15H14.69L15.64 18.66C15.78 19.21 15.64 19.79 15.26 20.21L13.4 22.4L8 17V4H18.5C19.33 4 20.06 4.55 20.29 5.34L22 11.34V13.5Z" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    
                </button>
            </div>
            </span>
        `;

        // Set the inner HTML of the vote-buttons div
        document.getElementById(`post-vote-buttons-${post.post_id}`).innerHTML = voteButtonsHtml;
    })
    .catch(error => console.error("Error fetching vote data:", error));
}

function vote(postId, voteType) {
    fetch('vote.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ post_id: postId, vote: voteType })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateVoteCount(postId, voteType);
            // Update button state based on the new vote
            generateVoteButtons({ post_id: postId, votes: data.newVoteCount, userVote: voteType });
        } else {
            console.log('Vote failed');
        }
    })
    .catch(error => {
        console.error('Error voting:', error);
        alert("Error submitting vote. Please try again.");
    });
}
function updateVoteCount(postId, voteType) {
    const postElement = document.getElementById(`post-${postId}`);
    if (!postElement) return;
    
    const votesElement = postElement.querySelector('h4');
    let match = votesElement.innerText.match(/\(([-+]?\d+)\)/);
    let currentVotes = match ? parseInt(match[1]) : 0;

    if (voteType === 'UP') {
        currentVotes++;
    } else if (voteType === 'DOWN') {
        currentVotes--;
    }

    votesElement.innerText = `${votesElement.innerText.split('(')[0]} (${currentVotes})`;
}

function loadMorePosts() {
    loadPosts();
}

function loadHeader() {
    fetch("header.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header-container").innerHTML = data;
        })
        .catch(error => {
            console.error("Error loading header:", error);
            document.getElementById("header-container").innerHTML = "<p>Error loading header</p>";
        });
}

document.addEventListener("DOMContentLoaded", loadHeader);

document.addEventListener("DOMContentLoaded", checkDarkMode);


function toggleDarkMode() {
    let body = document.body;
    body.classList.toggle("dark-mode");
    localStorage.setItem("darkMode", body.classList.contains("dark-mode") ? "enabled" : "disabled");
}

function checkDarkMode() {
    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
    }
}



function toggleLoginForm() {
    let loginModal = document.getElementById("login-modal");
    if (!loginModal) return;
    loginModal.style.display = loginModal.style.display === "block" ? "none" : "block";
}

function handleLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (!username || !password) {
        alert("Please enter both username and password.");
        return;
    }

    fetch("auth.php?action=login", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            
            location.reload();  // Refresh the page to reflect the login state
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}

function toggleRegisterForm() {
    let registerModal = document.getElementById("register-modal");
    if (!registerModal) return;
    registerModal.style.display = registerModal.style.display === "block" ? "none" : "block";
    toggleLoginForm();  // Hide the login modal when showing the registration modal
}

function handleRegister() {
    let username = document.getElementById("new-username").value;
    let password = document.getElementById("new-password").value;
    let confirmPassword = document.getElementById("confirm-password").value;

    if (!username || !password || !confirmPassword) {
        alert("Please fill in all fields.");
        return;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }

    fetch("register.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}&confirmation=${encodeURIComponent(confirmPassword)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Registration successful! You can now log in.");
            toggleRegisterForm();  // Close the modal on success
        } else {
            alert(data.message);  // Show the error message returned from PHP
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred during registration. Please try again.");
    });
}




function handleLogout() {
    fetch("auth.php?action=logout", {
        method: "POST"
    })
    .then(() => {
        location.reload();  // Refresh page after logout
    })
    .catch(error => console.error("Error:", error));
}

document.addEventListener("DOMContentLoaded", function() {
    let loginBtn = document.getElementById("login-btn");
    if (!loginBtn) return;

    fetch("auth.php?action=check_session")  // Check if the user is logged in
    .then(response => response.json())
    .then(data => {
        if (data.loggedIn) {
            loginBtn.textContent = "Logout";
            loginBtn.onclick = handleLogout;
        } else {
            loginBtn.textContent = "Login";
            loginBtn.onclick = toggleLoginForm;
        }
    })
    .catch(error => console.error("Error:", error));
});

// Utility functions
const lerp = (f0, f1, t) => (1 - t) * f0 + t * f1;
const clamp = (val, min, max) => Math.max(min, Math.min(val, max));

document.addEventListener("DOMContentLoaded", function () {
    const societiesData = document.getElementById("societies-data").getAttribute('data-societies');
    const societies = JSON.parse(societiesData);  // Parse the JSON string into an array

    const carousel = document.getElementById("carousel");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    let currentIndex = 0;

    // Create carousel items dynamically from societies
    function createCarouselItems(societies) {
        const carouselWrap = document.querySelector(".carousel--wrap");
        carouselWrap.innerHTML = "";  // Clear any previous items

        societies.forEach(society => {
            const item = document.createElement("div");
            item.classList.add("carousel--item");

            const img = document.createElement("img");
            img.src = society.image_location;
            img.alt = society.name;

        const caption = document.createElement("a");
        caption.innerText = society.name;
        caption.href = society.url || `/soc/soc?soc=${encodeURIComponent(society.name)}`; // Replace 'url' with the correct property from your data

            item.appendChild(img);
            item.appendChild(caption);
            carouselWrap.appendChild(item);
        });
    }

// Initialize the carousel
createCarouselItems(societies);

// Set up drag-to-scroll functionality
class DragScroll {
    constructor(obj) {
        this.$el = document.querySelector(obj.el);
        this.$wrap = this.$el.querySelector(obj.wrap);
        this.$items = this.$el.querySelectorAll(obj.item);
        this.$bar = this.$el.querySelector(obj.bar);
        this.init();
    }

    init() {
        this.progress = 0;
        this.speed = 0;
        this.oldX = 0;
        this.x = 0;
        this.playrate = 0;
        this.dragging = false;
        this.bindings();
        this.events();
        this.calculate();
        this.raf();
    }

    bindings() {
        [
            'events', 'calculate', 'raf', 'handleWheel', 'move', 'handleTouchStart',
            'handleTouchMove', 'handleTouchEnd'
        ].forEach(i => { this[i] = this[i].bind(this) });
    }

    calculate() {
        this.progress = 0;
        this.wrapWidth = this.$items[0].clientWidth * this.$items.length;
        this.$wrap.style.width = `${this.wrapWidth}px`;
        this.maxScroll = this.wrapWidth - this.$el.clientWidth;
    }

    handleWheel(e) {
        if (this.$el.matches(':hover') && !e.target.closest("input, textarea")) {  
            e.preventDefault();
            this.progress += e.deltaY;
            this.move();
        }
    }

    handleTouchStart(e) {
        if (e.target.closest("input, textarea")) return; // Allow input interactions
        e.preventDefault();
        this.dragging = true;
        this.startX = e.clientX || e.touches[0].clientX;
        this.$el.classList.add('dragging');
    }

    handleTouchMove(e) {
        if (!this.dragging || e.target.closest("input, textarea")) return; // Allow typing
        const x = e.clientX || e.touches[0].clientX;
        this.progress += (this.startX - x) * 2.5;
        this.startX = x;
        this.move();
        e.preventDefault(); // Prevent page scrolling
    }

    handleTouchEnd() {
        this.dragging = false;
        this.$el.classList.remove('dragging');
    }

    move() {
        this.progress = clamp(this.progress, 0, this.maxScroll);
    }

    events() {
        window.addEventListener('resize', this.calculate);
        this.$el.addEventListener('wheel', this.handleWheel);
        this.$el.addEventListener('touchstart', this.handleTouchStart);
        this.$el.addEventListener('touchmove', this.handleTouchMove);
        this.$el.addEventListener('touchend', this.handleTouchEnd);
        this.$el.addEventListener('mousedown', this.handleTouchStart);
        this.$el.addEventListener('mousemove', this.handleTouchMove);
        this.$el.addEventListener('mouseup', this.handleTouchEnd);
    }

    raf() {
        this.x = lerp(this.x, this.progress, 0.1);
        this.playrate = this.x / this.maxScroll;
        this.$wrap.style.transform = `translateX(${-this.x}px)`;
        this.$bar.style.transform = `scaleX(${.18 + this.playrate * .82})`;
        this.speed = Math.min(100, this.oldX - this.x);
        this.oldX = this.x;
        this.scale = lerp(this.scale, this.speed, 0.1);
        this.$items.forEach(i => {
            i.style.transform = `scale(${1 - Math.abs(this.speed) * 0.002})`;
            i.querySelector('img').style.transform = `scaleX(${1 + Math.abs(this.speed) * 0.004})`;
        });
    }
}

const scroll = new DragScroll({
    el: '.carousel',
    wrap: '.carousel--wrap',
    item: '.carousel--item',
    bar: '.carousel--progress-bar',
});

const raf = () => {
    requestAnimationFrame(raf);
    scroll.raf();
};
raf();


function updateCarouselPosition() {
    const itemWidth = document.querySelector(".carousel--item").offsetWidth;
    const wrap = document.querySelector(".carousel--wrap");
    wrap.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}

});

document.addEventListener("DOMContentLoaded", function () {
    loadPosts(); // Load posts automatically when the page loads
    checkDarkMode();
    
});

function togglePostContent(postId, socName) {

    const contentDiv = document.getElementById(`post-content-${postId}`);
    const postContainer = document.getElementById(`post-${postId}`);
    const thumbnail = document.querySelector(`#post-${postId} .post-thumbnail`);
    const contentBox = document.getElementById("post-content-box"); // The box for expanded content

    console.log("togglePostContent called for postId:", postId);

    if (!contentDiv) {
        console.error(`Post content div with ID 'post-content-${postId}' not found.`);
        return;
    }

    if (contentDiv.style.display === "block") {
        closePost(postId);
        return;
    }

    if (contentDiv.dataset.loaded === "true") {

        // Show the content in the expanded box with the animation
        contentDiv.style.display = "block";
        postContainer.classList.add("expanded");
        thumbnail.style.display = "none"; // Hide thumbnail

        // Animate the content into the box
        setTimeout(() => {
            contentBox.classList.add("open");
        }, 10);  // Delay to ensure the transition is applied
        return;
    }

    contentDiv.innerHTML = "<em>Loading...</em>";
    contentDiv.style.display = "block";
    postContainer.classList.add("expanded");
    thumbnail.style.display = "none"; // Hide thumbnail

    fetch(`fetch_post_content.php?pid=${postId}&soc=${encodeURIComponent(socName)}`)

        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let post = data.post;
                let mediaContent = "";

                if (post.image_location) {
                    if (post.media_type === "video" || post.image_location.endsWith(".mp4")) {

                        mediaContent = `<video width="600" controls>
                            <source src="../${post.image_location}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>`;
                    } else if (post.media_type === "image" || /\.(jpg|jpeg|png|gif|webp)$/i.test(post.image_location)) {

                        mediaContent = `<img src="../${post.image_location}" class="img-post" width="600" onerror="this.onerror=null; this.src='../uploads/style/no_thumb_loaded.PNG';"/>`;
                    } else if (post.media_type === "iframe") {
                        mediaContent = `<iframe src="../${post.image_location}" width="600" height="400"></iframe>`;
                    }
                }

                let postContent = `
                    <div class="post-details">
                        ${mediaContent}
                        <p>${post.text}</p>
                        <hr>
                        <span class="pill-box">
                            <button class="post-button" onclick="sharePost(${post.post_id})">Share</button>
                            <button class="post-button" onclick="reportPost(${post.post_id})">Report</button>
                            <button class="post-button" onclick="deletePost(${post.post_id})">Delete</button>
                        </span>
                        <span class="close-content">
                            <button class="close-btn" onclick="closePost(${postId})">Close</button>
                        </span>
                        <span class="open-post-button">
                            <button class="post-button" onclick="window.open('/post?pid=${postId}&soc=${encodeURIComponent(socName)}', '_blank')">Open in New Window</button>
                        </span>
                                         <h3>Comments</h3>
                            <div id="comments-${postId}" class="comments-container"></div>
                            <form id="commentForm-${postId}" onsubmit="submitComment(event, ${postId})">
                                <input type="text" id="commentInput-${postId}" placeholder="Write a comment..." required>
                                <button type="submit">Post</button>
                            </form>
                    </div>
                `;

                if (post.text.includes("<blockquote class=\"twitter-tweet\"")) {
                    postContent += post.text;
                }

                contentDiv.innerHTML = postContent;
                contentDiv.dataset.loaded = "true";

                // Re-initialize Twitter widgets after inserting tweet embed code
                if (typeof twttr !== 'undefined') {
                    twttr.widgets.load(); // Ensure the embedded tweets are rendered
                } else {
                    // If Twitter script is not loaded yet, load it dynamically
                    const script = document.createElement('script');
                    script.src = "https://platform.twitter.com/widgets.js";
                    script.async = true;
                    script.onload = () => twttr.widgets.load(); // Load Twitter widgets once script is loaded
                    document.body.appendChild(script);
                }
            } else {
                contentDiv.innerHTML = `<p style="color: red;">${data.message}</p>`;

            }
        })
        .catch(error => {
            contentDiv.innerHTML = "<p style='color: red;'>Error loading post content.</p>";
            console.error("Error fetching post content:", error);
        });
}




function closePost(postId) {
    const contentDiv = document.getElementById(`post-content-${postId}`);
    const postContainer = document.getElementById(`post-${postId}`);
    const thumbnail = document.querySelector(`#post-${postId} .post-thumbnail`);
    const contentBox = document.getElementById("post-content-box");

    if (contentDiv) contentDiv.style.display = "none"; // Hide post content
    if (postContainer) postContainer.classList.remove("expanded"); // Remove expanded class

    // Animate closing and reset content box
    contentBox.classList.remove("open");

    // Ensure the thumbnail reappears
    if (thumbnail) {
        thumbnail.style.removeProperty("display"); // Reset to default (removes "display: none")
        thumbnail.classList.remove("hidden-thumbnail"); // If a hidden class was added, remove it
    }
}
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-comments").forEach(button => {
        button.addEventListener("click", function () {
            const postId = this.getAttribute("data-post-id");
            const commentsContainer = document.getElementById(`comments-${postId}`);

            // Toggle visibility
            if (commentsContainer.style.display === "none" || commentsContainer.innerHTML === "") {
                commentsContainer.style.display = "block";
                loadComments(postId);
            } else {
                commentsContainer.style.display = "none";
            }
        });
    });
});


function loadComments(postId) {
    fetch(`/load-comments.php?postId=${postId}`)
   .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error("Error fetching comments:", data.message);
                return;
            }

            const commentsContainer = document.getElementById(`comments-${postId}`);
            if (!commentsContainer) {
                console.error(`Comments container not found for post ${postId}`);
                return;
            }

            commentsContainer.innerHTML = ""; // Clear existing comments before loading new ones

            const comments = data.comments;
            const commentTree = buildCommentTree(comments);

            // Append the generated comment tree to the container
            commentsContainer.appendChild(commentTree);
        })
        .catch(error => {
            console.error("Error loading comments:", error);
        });
}

function buildCommentTree(comments) {
    const commentMap = new Map();

    // Create a map of comment objects
    comments.forEach(comment => {
        commentMap.set(comment.comm_id, {
            ...comment,
            replies: []
        });
    });

    const rootComments = [];

    // Build the tree structure
    comments.forEach(comment => {
        if (comment.anc_id === comment.comm_id) {
            // Top-level comment (no parent)
            rootComments.push(commentMap.get(comment.comm_id));
        } else {
            // Reply to another comment
            const parentComment = commentMap.get(comment.anc_id);
            if (parentComment) {
                parentComment.replies.push(commentMap.get(comment.comm_id));
            }
        }
    });

    // Generate HTML elements
    return createCommentElements(rootComments);
}

function createCommentElements(comments) {
    const fragment = document.createDocumentFragment();

    comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.classList.add("comment");

        commentDiv.innerHTML = `
            <strong>${comment.username}</strong> <small>(${comment.time})</small>
            <p>${comment.text}</p>
        `;

        // If the comment has replies, recursively create them
        if (comment.replies.length > 0) {
            const repliesContainer = document.createElement("div");
            repliesContainer.classList.add("comment-replies");
            repliesContainer.appendChild(createCommentElements(comment.replies));
            commentDiv.appendChild(repliesContainer);
        }

        fragment.appendChild(commentDiv);
    });

    return fragment;
}

