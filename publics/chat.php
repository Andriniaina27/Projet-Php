<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat UI</title>
    <!-- Bootstrap CSS -->
    <link href="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?nature,water') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .chat-container {
            width: 90%;
            max-width: 900px;
            height: 80vh;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
        }
        /* Sidebar */
        .sidebar {
            width: 30%;
            background: #111;
            padding: 15px;
            color: white;
            overflow-y: auto;
        }
        .sidebar h5 {
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chat-list {
            margin-top: 15px;
        }
        .chat-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .chat-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .chat-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-item .chat-info {
            flex-grow: 1;
        }
        .chat-item .status {
            font-size: 12px;
            color: #bbb;
        }
        .online {
            color: #28a745;
        }
        .away {
            color: #ffc107;
        }
        .offline {
            color: #dc3545;
        }

        /* Chat Section */
        .chat-section {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            padding: 15px;
            background: #222;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .message {
            display: flex;
            margin-bottom: 10px;
        }
        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .message-content {
            background: #333;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            color: white;
        }
        .message.me {
            justify-content: flex-end;
        }
        .message.me .message-content {
            background: #007bff;
        }
        .chat-footer {
            padding: 10px;
            background: #222;
            display: flex;
            align-items: center;
        }
        .chat-footer input {
            flex: 1;
            border-radius: 20px;
            padding: 8px;
            border: 1px solid #555;
            background: #333;
            color: white;
        }
        @media (max-width: 768px) {
            .chat-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: 30%;
            }
            .chat-section {
                height: 70%;
            }
        }
    </style>
</head>
<body>

<div class="chat-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h5>Simple Chat <i class="fas fa-bars"></i></h5>
        <div class="chat-list">
            <div class="chat-item">
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="chat-info">
                    <strong>John Davidson</strong>
                    <p class="status online">• Online</p>
                </div>
                <span class="text-white-50">03:42</span>
            </div>
            <div class="chat-item">
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="chat-info">
                    <strong>Frank Jackson</strong>
                    <p class="status offline">• Offline</p>
                </div>
                <span class="text-white-50">03:42</span>
            </div>
            <div class="chat-item">
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="chat-info">
                    <strong>Melissa Naude</strong>
                    <p class="status away">• Away</p>
                </div>
                <span class="text-white-50">03:42</span>
            </div>
        </div>
    </div>

    <!-- Chat Section -->
    <div class="chat-section">
        <div class="chat-header">
            <strong>To: Jason Davidson</strong>
            <i class="fas fa-ellipsis-v"></i>
        </div>

        <div class="chat-messages">
            <div class="message">
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="message-content">
                    You think we can meet tomorrow for coffee at the place on the corner?
                </div>
            </div>
            <div class="message me">
                <div class="message-content">
                    Hopefully :(
                </div>
                <img src="https://via.placeholder.com/40" alt="User">
            </div>
            <div class="message">
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="message-content">
                    Been working super late this past week, trying to meet this deadline.
                </div>
            </div>
            <div class="message me">
                <div class="message-content">
                    No worries mate, I understand. It's always stressful before a launch.
                </div>
                <img src="https://via.placeholder.com/40" alt="User">
            </div>
        </div>

        <div class="chat-footer">
            <input type="text" class="form-control" placeholder="Type something...">
            <button class="btn btn-primary ms-2"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="../publics/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
