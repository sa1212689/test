
<?php
$siteName = "Nova";
$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $text = trim($_POST["message"] ?? "");

    if (
        $name !== "" &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        $text !== ""
    ) {
        // فعلاً فرم فقط اعتبارسنجی می‌شود.
        // برای ارسال واقعی پیام، بک‌اند یا سرویس ایمیل لازم است.
        $message = "اطلاعات فرم با موفقیت بررسی شد.";
    } else {
        $error = "لطفاً همه فیلدها را درست تکمیل کن.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($siteName) ?> | صفحه اصلی</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f7fb;
            color: #172033;
            line-height: 1.9;
        }
        header {
            background: #101827;
            color: white;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .logo { font-size: 25px; font-weight: bold; }
        .logo span { color: #60a5fa; }
        nav a {
            color: #e5e7eb;
            text-decoration: none;
            margin-right: 18px;
        }
        .hero {
            background: linear-gradient(135deg, #101827, #243b67);
            color: white;
            padding: 85px 7%;
            text-align: center;
        }
        .hero h1 { font-size: clamp(28px, 5vw, 48px); }
        .hero p { color: #d1d9e8; }
        .button {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 24px;
            background: #3b82f6;
            color: white;
            border-radius: 9px;
            text-decoration: none;
        }
        main { max-width: 1000px; margin: auto; padding: 35px 20px; }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }
        .card, .contact {
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 5px 20px #1018270b;
        }
        .card h3 { color: #2563eb; }
        form { display: grid; gap: 12px; }
        input, textarea, button {
            width: 100%;
            padding: 12px;
            font: inherit;
            border: 1px solid #d5dbe5;
            border-radius: 8px;
        }
        textarea { min-height: 120px; resize: vertical; }
        button {
            background: #2563eb;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .notice { padding: 12px; background: #dcfce7; border-radius: 8px; }
        .error { padding: 12px; background: #fee2e2; border-radius: 8px; }
        footer {
            background: #101827;
            color: #d1d5db;
            text-align: center;
            padding: 22px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">Nova<span>.</span></div>
    <nav>
        <a href="#home">خانه</a>
        <a href="#about">درباره ما</a>
        <a href="#contact">تماس</a>
    </nav>
</header>

<section class="hero" id="home">
    <h1>به وب‌سایت ما خوش آمدی!</h1>
    <p>ایده‌های بزرگ، با یک قدم کوچک شروع می‌شوند.</p>
    <a class="button" href="#about">بیشتر بدانید</a>
</section>

<main>
    <section id="about">
        <h2>چرا ما؟</h2>
        <div class="cards">
            <article class="card">
                <h3>⚡ سرعت بالا</h3>
                <p>ساختاری سبک برای تجربه‌ای سریع و روان.</p>
            </article>
            <article class="card">
                <h3>📱 طراحی واکنش‌گرا</h3>
                <p>نمایش مناسب در موبایل، تبلت و کامپیوتر.</p>
            </article>
            <article class="card">
                <h3>🔒 ساختار ساده</h3>
                <p>کدی خوانا برای توسعه و شخصی‌سازی آسان.</p>
            </article>
        </div>
    </section>

    <section id="contact" style="margin-top:40px">
        <div class="contact">
            <h2>تماس با ما</h2>

            <?php if ($message): ?>
                <p class="notice">
                    <?= htmlspecialchars($message) ?>
                </p>
            <?php endif; ?>

            <?php if ($error): ?>
                <p class="error">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>

            <form method="post" action="#contact">
                <input name="name" placeholder="نام شما"
                       maxlength="100" required>
                <input name="email" type="email"
                       placeholder="ایمیل شما" maxlength="254" required>
                <textarea name="message" placeholder="پیام شما"
                          maxlength="3000" required></textarea>
                <button type="submit">بررسی و ارسال فرم</button>
            </form>
        </div>
    </section>
</main>

<footer>
    © <?= date("Y") ?> <?= htmlspecialchars($siteName) ?> - تمامی حقوق محفوظ است.
</footer>
</body>
</html>
