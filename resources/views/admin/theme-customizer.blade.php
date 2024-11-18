<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Customizer</title>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: var(--background-color, #ffffff);
            color: var(--text-color, #000000);
        }

        :root[data-theme="light"] {
            --background-color: #ffffff;
            --text-color: #000000;
            --button-bg: #f0f0f0;
            --button-hover-bg: #e0e0e0;
            --header-bg: #f5f5f5;
        }

        :root[data-theme="dark"] {
            --background-color: #121212;
            --text-color: #ffffff;
            --button-bg: #333333;
            --button-hover-bg: #444444;
            --header-bg: #1a1a1a;
        }

        :root[data-theme="system"] {
            --background-color: #eaeaea;
            --text-color: #000000;
            --button-bg: #d3d3d3;
            --button-hover-bg: #c3c3c3;
            --header-bg: #e0e0e0;
        }

        .theme-customizer {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
            background-color: var(--background-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            z-index: 1000;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .theme-customizer .header {
            background-color: var(--header-bg);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .theme-customizer .header h4 {
            font-size: 1.2rem;
        }

        .theme-customizer .header button {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .theme-customizer .body {
            padding: 15px;
        }

        .theme-customizer .body h5 {
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .theme-customizer .modes, .theme-customizer .theme-options {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .theme-customizer button {
            padding: 10px 15px;
            background-color: var(--button-bg);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .theme-customizer button:hover {
            background-color: var(--button-hover-bg);
        }
    </style>
</head>
<body>
    <div class="theme-customizer">
        <div class="header">
            <h4>Template Customizer</h4>
            <button onclick="closeCustomizer()">✖</button>
        </div>
        <div class="body">
            <h5>Theming</h5>
            <div class="modes">
                <button onclick="setTheme('light')">🌞 Light</button>
                <button onclick="setTheme('dark')">🌙 Dark</button>
                <button onclick="setTheme('system')">💻 System</button>
            </div>
            <h5>Themes</h5>
            <div class="theme-options">
                <button onclick="setLayout('default')">Default</button>
                <button onclick="setLayout('bordered')">Bordered</button>
                <button onclick="setLayout('semi-dark')">Semi Dark</button>
            </div>
        </div>
    </div>

    <script>
        // Load saved theme and layout on page load
        document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme") || "light";
            const savedLayout = localStorage.getItem("layout") || "default";

            document.documentElement.setAttribute("data-theme", savedTheme);
            document.documentElement.setAttribute("data-layout", savedLayout);
        });

        // Set the theme and save to localStorage
        function setTheme(theme) {
            document.documentElement.setAttribute("data-theme", theme);
            localStorage.setItem("theme", theme);
        }

        // Set the layout and save to localStorage
        function setLayout(layout) {
            document.documentElement.setAttribute("data-layout", layout);
            localStorage.setItem("layout", layout);
        }

        function closeCustomizer() {
            document.querySelector('.theme-customizer').style.display = 'none';
        }
    </script>
</body>
</html>