let currentOffset = 0;
const limit = 10; // Number of posts per request

function sortPostsByTime(posts) {
    return posts.sort((a, b) => new Date(b.time) - new Date(a.time)); // Newest first
}

function renderPosts(posts) {
    const sortedPosts = sortPostsByTime(posts);
    const postsContainer = document.getElementById('posts-container');
    
    sortedPosts.forEach(post => {
        const postSummaryHTML = post_summary(post);
        postsContainer.insertAdjacentHTML('beforeend', postSummaryHTML);
    });
}

function loadPosts() {
    fetch(`get_news_feed.php?lim=${limit}&offset=${currentOffset}`)
        .then(response => response.json())
        .then(data => {
            const newsFeedContainer = document.getElementById('news-feed');
            const sortedPosts = sortPostsByTime(data.posts); // Ensure sorting before rendering

            sortedPosts.forEach(post => {
                const postHTML = post_summary(post);
                newsFeedContainer.insertAdjacentHTML('beforeend', postHTML);
            });

            currentOffset += limit;
        })
        .catch(error => console.error('Error fetching posts:', error));
}


function post_summary(post) {
    const postId = post.post_id || "unknown";
    const society = post.society || "default_society";
    const imageSrc = post.image_location ? `../${post.image_location}` : '../uploads/style/no_thumb_loaded.PNG';

    return `
        <div class="post-summary" id="post-${postId}">
            <div class="post-thumbnail">
                <img src="${imageSrc}" alt="Thumbnail">
            </div>

            <div class="post-details">
                <span class="post-title" 
                      id="${postId}" 
                      onclick="togglePostContent(${postId}, '${society}')" 
                      style="cursor: pointer; color: blue; text-decoration: underline;">
                    ${post.title}
                </span>
                <small>Submitted by ${post.username} on ${post.time}</small>

                <div class="vote-buttons" id="post-vote-buttons-${postId}">
                    ${generateVoteButtons(post)}
                </div>

                <div class="comments-count">${post.comments} comments</div>
            </div>

            <!-- Initially hidden post content -->
            <div id="post-content-${postId}" class="post-content" 
                 style="display: none; padding: 10px; border-top: 1px solid #ccc;">
                <em>Loading...</em>
            </div>
        </div>
        <hr class="post-feed">
    `;
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
            <div class="vote-group" role="group">
                <button class="post-upvote${upvoteClass}" id="post-up-${post.post_id}" onclick="vote(${post.post_id}, 'UP')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="green" stroke-width="2">
  <path d="M2 10H5V22H2V10Z" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22 10.5C22 9.67 21.33 9 20.5 9H14.69L15.64 5.34C15.78 4.79 15.64 4.21 15.26 3.79L13.4 1.6L8 7V20H18.5C19.33 20 20.06 19.45 20.29 18.66L22 12.66V10.5Z" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    
                </button>
                <button class="vote-count">${post.votes > 0 ? "+" : ""}${post.votes} </button>
                <button class="post-downvote${downvoteClass}" id="post-down-${post.post_id}" onclick="vote(${post.post_id}, 'DOWN')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="red" stroke-width="2">
  <path d="M2 2H5V14H2V2Z" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M22 13.5C22 14.33 21.33 15 20.5 15H14.69L15.64 18.66C15.78 19.21 15.64 19.79 15.26 20.21L13.4 22.4L8 17V4H18.5C19.33 4 20.06 4.55 20.29 5.34L22 11.34V13.5Z" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    
                </button>
            </div>
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

document.addEventListener("DOMContentLoaded", function () {
    updateLoginButton();
});

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
    let modal = document.getElementById("login-modal");
    if (!modal) return;
    modal.style.display = modal.style.display === "block" ? "none" : "block";
}

function handleLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (!username || !password) {
        alert("Please enter both username and password.");
        return;
    }

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
    fetch("logout.php");
    updateLoginButton();
}

function updateLoginButton() {
    let loginBtn = document.getElementById("login-btn");
    if (!loginBtn) return;
    
    let user = localStorage.getItem("loggedInUser");
    loginBtn.textContent = user ? "Logout" : "Login";
    loginBtn.onclick = user ? handleLogout : toggleLoginForm;
}

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

            const caption = document.createElement("p");
            caption.innerText = society.name;

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
    if (this.$el.matches(':hover')) { // Only scroll the carousel when hovering over it
        e.preventDefault();
        this.progress += e.deltaY;
        this.move();
    }
}

        handleTouchStart(e) {
            e.preventDefault();
            this.dragging = true;
            this.startX = e.clientX || e.touches[0].clientX;
            this.$el.classList.add('dragging');
        }

        handleTouchMove(e) {
    if (!this.dragging) return false;
    
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
            window.addEventListener('wheel', this.handleWheel);
            this.$el.addEventListener('touchstart', this.handleTouchStart);
            window.addEventListener('touchmove', this.handleTouchMove);
            window.addEventListener('touchend', this.handleTouchEnd);
            window.addEventListener('mousedown', this.handleTouchStart);
            window.addEventListener('mousemove', this.handleTouchMove);
            window.addEventListener('mouseup', this.handleTouchEnd);
            document.body.addEventListener('mouseleave', this.handleTouchEnd);
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
    updateLoginButton();
});

function togglePostContent(postId, socName) {
    const contentDiv = document.getElementById(`post-content-${postId}`);
    
    // Check if the contentDiv exists
    if (!contentDiv) {
        console.error(`Post content div with ID 'post-content-${postId}' not found.`);
        
        return;
    }

    if (contentDiv.style.display === "block") {
        contentDiv.style.display = "none"; // Hide content
        return;
    }

    if (contentDiv.dataset.loaded === "true") {
        contentDiv.style.display = "block";
        return;
    }

    // Initially show "loading..."
    contentDiv.innerHTML = "<em>Loading post...</em>";
    contentDiv.style.display = "block";

    // Fetch the post content using the correct parameters
    fetch(`fetch_post_content.php?pid=${postId}&soc=${socName}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let post = data.post;
                let mediaContent = "";

                if (post.media_type === "video") {
                    mediaContent = `<video width="600" controls>
                        <source src="../${post.image_location}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>`;
                } else if (post.media_type === "image") {
                    mediaContent = `<img src="../${post.image_location}" class="img-post" width="600" />`;
                }

                contentDiv.innerHTML = `
                    <div class="post-details">
                        <h3>${post.title} <small>(Votes: ${post.votes})</small></h3>
                        <small>Submitted by 
                            <img src="../uploaded_img/${post.user_thumbnail}" width="30" height="30" style="border-radius: 50%;" /> 
                            ${post.username} on ${post.relative_time}
                        </small>
                        <p>${post.text}</p>
                        ${mediaContent}
                        <hr>
                        <button onclick="sharePost(${post.post_id})">Share</button>
                        <button onclick="reportPost(${post.post_id})">Report</button>
                        <button onclick="deletePost(${post.post_id})">Delete</button>
                    </div>
                `;

                contentDiv.dataset.loaded = "true";
            } else {
                contentDiv.innerHTML = `<p style="color: red;">${data.message}</p>`;
            }
        })
        .catch(error => {
            contentDiv.innerHTML = "<p style='color: red;'>Error loading post content.</p>";
            console.error("Error fetching post content:", error);
        });
}




