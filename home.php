<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PinClass </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }

        #homeContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 40px 10px;
            min-height: 100vh;
        }

        .upload-section, .post {
            background: rgba(31, 31, 31, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }

        .post img, .post video {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .post img:hover, .post video:hover {
            transform: scale(1.05);
        }

        .post-content button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 12px 20px;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        /* Like Button Style */
        .like-btn {
            background-color: #ff6b81;
            color: white;
            transition: background-color 0.3s, transform 0.2s;
        }

        .like-btn:hover {
            background-color: #ff4757;
            transform: scale(1.05);
        }

        /* Comment Button Style */
        .comment-btn {
            background-color: #1e90ff;
            color: white;
            transition: background-color 0.3s, transform 0.2s;
        }

        .comment-btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        /* Logout Button Style */
        .logout-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(45deg, #ff6b81, #ff4757, #ffcc00);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 129, 0.5);
        }

        .logout-button:hover {
            background: linear-gradient(45deg, #ff4757, #ff6b81, #ffcc00);
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(255, 107, 129, 0.7);
        }

        .comment-section {
            margin-top: 10px;
            display: none;
        }

        .comment-section input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
            background: #2c3e50;
            color: #fff;
        }

        .comment {
            background: rgba(255, 255, 255, 0.1);
            padding: 8px;
            border-radius: 5px;
            margin-top: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <button class="logout-button" onclick="logout()">Logout</button>

    <div id="homeContainer">
        <div class="upload-section">
            <h4>Create a New Post</h4>
            <input type="file" id="mediaInput" accept="image/*,video/*" class="form-control mb-2">
            <input type="text" id="captionInput" placeholder="Add a caption..." class="form-control mb-2">
            <button onclick="addPost()">Post</button>
        </div>

        <div id="postContainer"></div>
    </div>

    <script>
        function addPost() {
            const fileInput = document.getElementById('mediaInput');
            const caption = document.getElementById('captionInput').value;
            const postContainer = document.getElementById('postContainer');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const postDiv = document.createElement('div');
                postDiv.classList.add('post');

                // Check if the file is an image or video and render accordingly
                if (file.type.startsWith('image/')) {
                    postDiv.innerHTML = `
                        <img src="${URL.createObjectURL(file)}" alt="Post Image">
                        <div class="post-content">
                            <p>${caption}</p>
                            <button class="like-btn" onclick="likePost(this)">❤️ Like</button>
                            <button class="comment-btn" onclick="toggleCommentSection(this)">💬 Comment</button>
                            <div class="comment-section">
                                <input type="text" placeholder="Write a comment..." onkeypress="addComment(event, this)">
                                <div class="comments"></div>
                            </div>
                        </div>
                    `;
                } else if (file.type.startsWith('video/')) {
                    postDiv.innerHTML = `
                        <video controls>
                            <source src="${URL.createObjectURL(file)}" type="${file.type}">
                            Your browser does not support the video tag.
                        </video>
                        <div class="post-content">
                            <p>${caption}</p>
                            <button class="like-btn" onclick="likePost(this)">❤️ Like</button>
                            <button class="comment-btn" onclick="toggleCommentSection(this)">💬 Comment</button>
                            <div class="comment-section">
                                <input type="text" placeholder="Write a comment..." onkeypress="addComment(event, this)">
                                <div class="comments"></div>
                            </div>
                        </div>
                    `;
                }
                postContainer.appendChild(postDiv);
                fileInput.value = '';
                document.getElementById('captionInput').value = '';
            }
        }

        function likePost(button) {
            button.textContent = button.textContent.includes('Liked') ? '❤️ Like' : '🔥 Liked';
            button.style.backgroundColor = button.textContent.includes('Liked') ? '#ff6b81' : '#ffa502';
        }

        function toggleCommentSection(button) {
            const commentSection = button.nextElementSibling;
            commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';
        }

        function addComment(event, input) {
            if (event.key === 'Enter' && input.value.trim() !== '') {
                const commentDiv = document.createElement('div');
                commentDiv.textContent = input.value;
                commentDiv.classList.add('comment');
                input.nextElementSibling.appendChild(commentDiv);
                input.value = '';
            }
        }

        function logout() {
            window.location.href = 'login.php';
        }
    </script>
</body>

</html>
