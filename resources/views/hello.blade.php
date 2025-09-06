<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا - ويلو ويب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hello-card {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
        }
        .hello-text {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        .subtitle {
            color: #6c757d;
            font-size: 1.2rem;
        }
        .home-btn {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="hello-card">
        <div class="hello-text">مرحبا</div>
        <div class="subtitle">أهلاً وسهلاً بك في ويلو ويب</div>
        <div class="home-btn">
            <a href="/" class="btn btn-primary btn-lg">العودة للرئيسية</a>
        </div>
    </div>
</body>
</html>