<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nasreldin Ibrahim Mohamed Blola">
    
    <title>سوبا: أرض الممالك والحضارات | Soba Kingdom</title>
    
    <meta name="description" content="البوابة الرسمية لمشروع سوبا التاريخية والمعاصرة. نوثق التراث والآثار وأحدث أخبار المجتمع والخدمات والصحة والتعليم في سوبا شرق وسوبا غرب.">
    <meta name="keywords" content="سوبا, مملكة سوبا, مملكة علوة, سوبا شرق, سوبا غرب, آثار سوبا, تاريخ السودان, سوبا اللعوتة, الخرطوم">

    <meta property="og:title" content="سوبا: أرض الممالك والحضارات | Soba Kingdom">
    <meta property="og:description" content="تعرف على تاريخ وآثار سوبا العريقة وأحدث أخبار مجتمع سوبا الحديثة وخدماتها.">
    <meta property="og:type" content="website">

    <link rel="stylesheet" href="st.css">
</head>

<body> 

    <header>
        <p>بسم الله الرحمن الرحيم</p>
        <h1> 
            مرحبا بكم في سوبا أرض الممالك والحضارات
            <br> Welcome to Soba Kingdom 
        </h1> 

        <!-- أزرار التنقل -->
        <nav>
            <button class="nav-btn active" data-target="home">الرئيسية والتعليقات</button>
            <button class="nav-btn" data-target="about">عن مملكة سوبا</button>
            <button class="nav-btn" data-target="education">سوبا بشكلها الحديث</button>
            <button class="nav-btn" data-target="services">الخدمات والتعليم والصحة</button>
            <button class="nav-btn" data-target="news">المجتمع وأحدث الأخبار والمقالات</button>
        </nav>
    </header>

    <main>
        
        <!-- 1. الرئيسية -->
        <div id="home" class="tab-content active">
            <h2>مرحبا بمرورك في أرض الممالك سوبا</h2>

            <!-- نموذج بيانات الزائر -->
            <div class="auth-container">
                <div id="login-form">
                    <h3>أدخل بياناتك للمشاركة بالتعليقات</h3>
                    <input type="text" id="user-name" placeholder="الاسم الكريم">
                    <input type="text" id="user-contact" placeholder="البريد الإلكتروني أو الهاتف">
                    <button type="button" class="btn-primary" onclick="loginUser()">حفظ البيانات</button>
                </div>
                <div id="user-welcome" style="display: none;">
                    <span id="welcome-message"></span>
                    <button type="button" class="btn-danger" onclick="logoutUser()">تغيير البيانات</button>
                </div>
            </div>

            <!-- صندوق تعليقات Disqus -->
            <div class="disqus-container">
                <h3>💬 شاركنا رأيك وتعليقك حول سوبا</h3>
                <div id="disqus_thread"></div>
            </div>
        </div>

        <!-- 2. عن مملكة سوبا -->
        <div id="about" class="tab-content">
            <h2>عن مملكة سوبا التاريخية</h2>
            
            <div class="about-container">
                <p>تعد <strong>مملكة سوبا</strong> واحدة من أعرق وأهم المحطات الحضارية والتاريخية في السودان؛ فقد كانت العاصمة التاريخية المجيدة لمملكة "علوة" النوبية العريقة التي امتد نفوذها لقرون طويلة على ضفاف النيل الأزرق.</p>
                <p>اشتهرت سوبا عبر التاريخ بكونها مركزاً تجارياً وثقافياً نابضاً بالحياة، وملتقى للطرق والقوافل، واحتوت على قصور فخمة ومعالم عمرانية فريدة تميزت باستخدام الطوب الأحمر والنقوش الفنية البديعة.</p>

                <div class="img-center-box">
                    <img src="images/b4.jpeg" alt="عن مملكة سوبا" class="about-img">
                </div>

                <p>واليوم، تمثل سوبا جسراً فريداً يربط بين عبق الماضي العريق وتطور الحاضر، حيث تضم المعالم الأثرية الخالدة إلى جانب التجمعات الحديثة والبنى التحتية التي تعكس أصالة المكان وأهميته الاستراتيجية.</p>

                <div class="img-center-box">
                    <img src="images/b1.png" alt="عن مملكة سوبا" class="about-img">
                </div>

                <p>مملكة سوبا (أو مملكة علوة) هي إحدى الممالك النوبية المسيحية الثلاث التي قامت في وسط السودان خلال العصور الوسطى.</p>

                <ul>
                    <li><strong>التأسيس والفترة:</strong> تأسست المملكة في القرن السادس الميلادي واستمر حكمها لما يقارب الألف عام.</li>
                    <li><strong>العاصمة:</strong> مدينة سوبا (سوبا شرق، جنوب الخرطوم).</li>
                    <li><strong>الدين والثقافة:</strong> اعتمدت المسيحية وارتبطت بالكنيسة القبطية.</li>
                    <li><strong>السقوط:</strong> انتهت عام 1504م على يد تحالف عبد الله جماع وعمارة دنقس.</li>
                </ul>

                <div class="img-center-box">
                    <img src="images/b2.jpg" alt="عن مملكة سوبا" class="about-img">
                </div>
            </div>
        </div>

        <!-- 3. سوبا بشكلها الحديث -->
        <div id="education" class="tab-content">
            <h2>سوبا بشكلها الحديث</h2>
            <div class="modern-soba">
                <div class="img-center-box">
                    <img src="images/map.png" alt="خريطة سوبا">
                </div>
                
                <p>تعد سوبا الآن من أعظم المناطق في الخرطوم حيث تنتمي إلى الجزء الجنوبي الشرقي من الخرطوم وتقع منطقة سوبا في محليتين وهما محلية شرق النيل ومحلية سوبا والشهداء...</p>
                 <h3>أولاً: سوبا شرق</h3>
                 <p>هي الأصل والحضارة وفيها الآثار والمعالم الحقيقية لسوبا التي كانت عاصمة لمملكة المقرة.</p>
                <h3>ثانياً: منطقة سوبا غرب</h3>
                <p>تنتمي إلى محلية سوبا والشهداء وهي الأكبر حجماً والأقوى من حيث الاقتصاد والأقرب موقعاً من منتصف الخرطوم...</p>
            </div>
        </div>

        <!-- 4. الخدمات والتعليم والصحة -->
        <div id="services" class="tab-content">
            <h2>الخدمات والتعليم والصحة</h2>
            <p>تتعدد الخدمات في منطقة سوبا سواء كان في شرقها أو غربها فالمنطقة بها جميع الخدمات الصحية والتعليمية والخدمية...</p>
        </div>

        <!-- 5. المجتمع وأحدث الأخبار والمقالات -->
        <div id="news" class="tab-content">
            <h2>المجتمع وأحدث الأخبار</h2>

            <!-- قسم المقالات والأخبار -->
            <section id="articles-container">
                <h3>📰 أحدث المقالات والأخبار</h3>
                <div id="articles-list">
                    <!-- سيتم تحميل المقالات هنا بواسطة sob.js -->
                </div>
            </section>

            <h3 style="margin-top: 30px; text-align: center;">🌐 صفحات ومجموعات سوبا على الفيسبوك</h3>
            <div class="social-links-container">
                <a href="https://www.facebook.com/groups/764504526536117/" target="_blank" class="social-link"><span class="fb-icon">f</span> رابط صفحة سوبا على الفيسبوك</a><br>
                <a href="https://www.facebook.com/groups/sobaw" target="_blank" class="social-link"><span class="fb-icon">f</span> صفحة سوبا الحلة على الفيسبوك</a><br>
                <a href="https://www.facebook.com/groups/sobashar8" target="_blank" class="social-link"><span class="fb-icon">f</span> صفحة سوبا شرق على الفيسبوك</a><br>
                <a href="https://www.facebook.com/groups/996807887969938" target="_blank" class="social-link"><span class="fb-icon">f</span> سوبا اللعوتة أو الواحة على الفيسبوك</a><br>
                <a href="https://www.facebook.com/groups/1749248661938624" target="_blank" class="social-link"><span class="fb-icon">f</span> صفحة سوبا الأراضي على الفيسبوك</a><br>
                <a href="https://www.facebook.com/groups/537378892973931" target="_blank" class="social-link"><span class="fb-icon">f</span> صفحة سوبا المحطة على الفيسبوك</a><br>
            </div>
        </div>

    </main>

    <footer>
        <a href="https://nsrdinibra.github.io/nsr_site/" target="_blank">صفحة باش مهندس نصرالدين سوبا</a>
        <p>
            Author: Nasreldin Ibrahim Mohamed Blola<br>
            &copy; Rights reserved حقوق النشر محفوظة
        </p>
    </footer>

    <script src="sob.js"></script>
</body>
</html>
