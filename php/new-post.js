function openModal() {
    document.getElementById("newPostModal").style.display = "block";
}

function closeModal() {
    document.getElementById("newPostModal").style.display = "none";
}

// Function to show relevant fields based on dropdown selection
function togglePostFields() {
    let postType = document.getElementById("postType").value;
    
    document.getElementById("textFields").style.display = postType === "text" ? "block" : "none";
    document.getElementById("imageFields").style.display = postType === "image" ? "block" : "none";
    document.getElementById("videoFields").style.display = postType === "video" ? "block" : "none";
    document.getElementById("twitterFields").style.display = postType === "twitter" ? "block" : "none";
}

// Handle form submission
document.addEventListener("DOMContentLoaded", function () {
    // Now the DOM is fully loaded and we can safely add event listeners
    document.getElementById("newPostForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let postType = document.getElementById("postType").value;

        // Only append relevant fields to FormData based on post type
        if (postType === "twitter") {
            let twitterUrl = document.getElementById("postTwitter").value;
            let embedCode = `<blockquote class="twitter-tweet"><a href="${twitterUrl}"></a></blockquote>`;
            formData.set("text", embedCode);  // Overwrite the text field with embed code
        }

        // If post type is image or video, append relevant media file
        if (postType === "image" || postType === "video") {
            let mediaInput = document.getElementById("postImage") || document.getElementById("postVideo");
            if (mediaInput && mediaInput.files[0]) {
                formData.set("media", mediaInput.files[0]);  // Only append media if it's selected
            }
        }

        // Send the data
        fetch("submit_post.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log("Post Created:", data);

            if (data.success) {  // Ensure the response indicates success
                closeModal();
            } else {
                console.error("Error:", data.error);
                alert("Failed to create post: " + data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while submitting the post.");
        });
    });
});  

