document.addEventListener("DOMContentLoaded", function () {
    fetchArticles();
});

function fetchArticles(limit = 20, offset = 0) {
    fetch(`get_articles.php?limit=${limit}&offset=${offset}`)
        .then(response => response.json()) // Assuming the PHP script returns JSON
        .then(data => {
            if (data.success && data.articles.length > 0) {
                renderArticles(data.articles);
            } else {
                document.getElementById("artical-feed").innerHTML = "<p>No articles found.</p>";
            }
        })
        .catch(error => console.error("Error fetching articles:", error));
}

function renderArticles(articles) {
    const container = document.getElementById("artical-feed");
    container.innerHTML = ""; // Clear previous content

    articles.forEach(article => {
        const articleDiv = document.createElement("div");
        articleDiv.classList.add("article");

        articleDiv.innerHTML = `
    
            <h3>
          
                <a href="${article.url}" target="_blank" style="color: #b7c7b5;" rel="noopener noreferrer">
                    ${article.title}
                </a>
            </h3>
             <a href="${article.url}" target="_blank" rel="noopener noreferrer">
            ${article.image_url ? `<img src="${article.image_url}" alt="Article Image" style="max-width:100%; height:auto; margin-top:10px;">` : ""}
            </a>
            <p>${article.content || ""}</p> <!-- Default text if content is empty -->
            <small>Published on: ${article.created_at}</small>
            <hr>
        `;

        container.appendChild(articleDiv);
    });
}



