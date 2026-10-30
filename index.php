<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soba: Land of Kingdoms and Civilizations</title>
    <link rel="stylesheet" href="st.css">
    <style>
        .auth-container { background: #f8f9fa; border: 1px solid #e0e0e0; padding: 15px; border-radius: 8px; margin: 20px 0; text-align: center; }
        .article-card { background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); text-align: right; }
        .article-title { color: #0056b3; margin-top: 10px; }
        .comments-box { background: #f4f6f8; padding: 15px; border-radius: 6px; margin-top: 15px; }
        .comment-item { background: #fff; padding: 10px; border-radius: 4px; margin-bottom: 8px; border-right: 3px solid #007bff; text-align: right; }
    </style>
</head>

<body> 

    <header style="text-align: center;">
        <p>بسم الله الرحمن الرحيم</p>
        <h1> 
            مرحبا بكم في سوبا أرض الممالك والحضارات
            <br> Welcome to Soba Kingdom 
        </h1> 

        <!-- الأزرار الخمسة -->
        <nav>
            <button class="nav-btn active" data-target="home">الرئيسية والمقالات</button>
            <button class="nav-btn" data-target="about">عن مملكة سوبا</button>
            <button class="nav-btn" data-target="education">سوبا بشكلها الحديث</button>
            <button class="nav-btn" data-target="services">الخدمات والتعليم والصحة</button>
            <button class="nav-btn" data-target="news">المجتمع وأحدث الأخبار</button>
        </nav>
    </header>

    <main style="padding: 20px; margin-top: 30px; border-radius: 10px;">
        
        <!-- القسم الأول: الرئيسية (تحتوي على تسجبل البيانات والمقالات) -->
        <div id="home" class="tab-content active">
            <h2>مرحبا بمرورك في أرض الممالك سوبا</h2>

            <!-- نموذج تسجيل الدخول / إدخال البيانات للزائر -->
            <div class="auth-container">
                <div id="login-form">
                    <h3>أدخل بياناتك للمشاركة بالتعليقات</h3>
                    <input type="text" id="user-name" placeholder="الاسم الكريم" style="padding: 8px; width: 180px; margin: 5px;">
                    <input type="text" id="user-contact" placeholder="البريد الإلكتروني أو الهاتف" style="padding: 8px; width: 200px; margin: 5px;">
                    <button type="button" onclick="loginUser()" style="padding: 8px 15px; background: #007bff; color: brown; border: none; border-radius: 4px; cursor: pointer;">حفظ البيانات</button>
                </div>
                <div id="user-welcome" style="display: none;">
                    <span id="welcome-message" style="font-weight: bold; color: #28a745;"></span>
                    <button type="button" onclick="logoutUser()" style="padding: 5px 10px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 15px;">تغيير البيانات</button>
                </div>
            </div>

            <!-- عرض المقالات مع التعليقات التفاعلية لكل مقال -->
            <section id="articles-container" style="margin-top: 30px;">
                <h2 style="border-bottom: 2px solid #007bff; padding-bottom: 8px;">أحدث المقالات</h2>
                <div id="articles-list">
                    <p style="color: #666;">جاري تحميل المقالات من السيرفر...</p>
                </div>
            </section>
        </div>

        <!-- القسم الثاني: عن مملكة سوبا -->
        <div id="about" class="tab-content">
            <h2>عن مملكة سوبا التاريخية</h2>
            
            <div class="about-container">
                <p>تعد <strong>مملكة سوبا</strong> واحدة من أعرق وأهم المحطات الحضارية والتاريخية في السودان؛ فقد كانت العاصمة التاريخية المجيدة لمملكة "علوة" النوبية العريقة التي امتد نفوذها لقرون طويلة على ضفاف النيل الأزرق.</p>
                <p>اشتهرت سوبا عبر التاريخ بكونها مركزاً تجارياً وثقافياً نابضاً بالحياة، وملتقى للطرق والقوافل، واحتوت على قصور فخمة ومعالم عمرانية فريدة تميزت باستخدام الطوب الأحمر والنقوش الفنية البديعة.</p>

                <div class="img-center-box" style="text-align: center; margin: 20px 0;">
                    <img src="images/b4.jpeg" alt="عن مملكة سوبا" class="about-img" style="display: inline-block;">
                </div>

                <p>واليوم، تمثل سوبا جسراً فريداً يربط بين عبق الماضي العريق وتطور الحاضر، حيث تضم المعالم الأثرية الخالدة إلى جانب التجمعات الحديثة والبنى التحتية التي تعكس أصالة المكان وأهميته الاستراتيجية.</p>

                <div class="img-center-box" style="text-align: center; margin: 20px 0;">
                    <img src="images/b1.png" alt="عن مملكة سوبا" class="about-img" style="display: inline-block;">
                </div>

                <p>مملكة سوبا (أو مملكة علوة) هي إحدى الممالك النوبية المسيحية الثلاث التي قامت في وسط السودان خلال العصور الوسطى.</p>

                <ul>
                    <li><strong>التأسيس والفترة:</strong> تأسست المملكة في القرن السادس الميلادي واستمر حكمها لما يقارب الألف عام.</li>
                    <li><strong>العاصمة:</strong> مدينة سوبا (سوبا شرق، جنوب الخرطوم).</li>
                    <li><strong>الدين والثقافة:</strong> اعتمدت المسيحية وارتبطت بالكنيسة القبطية.</li>
                    <li><strong>السقوط:</strong> انتهت عام 1504م على يد تحالف عبد الله جماع وعمارة دنقس.</li>
                </ul>

                <div class="img-center-box" style="text-align: center; margin: 20px 0;">
                    <img src="images/b2.jpg" alt="عن مملكة سوبا" class="about-img" style="display: inline-block;">
                </div>
            </div>
        </div>

        <!-- القسم الثالث: سوبا بشكلها الحديث -->
        <div id="education" class="tab-content">
            <h2>سوبا بشكلها الحديث</h2>
            <div class="modern-soba">
                <div class="img-center-box" style="text-align: center; margin-bottom: 20px;">
                    <img src="images/map.png" alt="خريطة سوبا">
                </div>
                
               
                <p>تعد سوبا الآن من أعظم المناطق في الخرطوم حيث تنتمي إلى الجزء الجنوبي الشرقي من الخرطوم وتقع منطقة سوبا في محليتين وهما محلية شرق النيل ومحلية سوبا والشهداء...</p>
                 <h3>أولاً: سوبا شرق</h3>
                 <p>هي الاصل والحضارة وفيها الاثار والمعالم الحقيقية لسوبا التي كانت عاصمة لمملكة المقرة</p>
                <h3>ثانياً: منطقة سوبا غرب</h3>
                <p>تنتمي إلى محلية سوبا والشهداء وهي الأكبر حجماً والأقوى من حيث الاقتصاد والاقرب موقعا من منتصف الخرطوم...</p>
            </div>
        </div>

        <!-- القسم الرابع: الخدمات والتعليم والصحة -->
        <div id="services" class="tab-content">
            <h2>الخدمات والتعليم والصحة</h2>
            <p>تتعدد الخدمات في منطقة سوبا سواء كان في شرقها أو غربها فالمنطقة بهاجميع الخدمات الصحية والتعليمية والخدمية ...</p>
        </div>

        <!-- القسم الخامس: المجتمع وأحدث الأخبار -->
        <div id="news" class="tab-content">
            <h2>المجتمع وأحدث الأخبار</h2>
            <div class="social-links-container">
                <a href="https://www.facebook.com/groups/764504526536117/" target="_blank" class="social-link">
                    <span class="fb-icon">f</span> رابط صفحة سوبا على الفيسبوك
                </a><br>
                <a href="https://www.facebook.com/groups/sobaw" target="_blank" class="social-link">
                    <span class="fb-icon">f</span> صفحة سوبا الحلة على الفيسبوك
                </a><br>
                <a href="https://www.facebook.com/groups/sobashar8" target="_blank" class="social-link">
                    <span class="fb-icon">f</span> صفحة سوبا شرق على الفيسبوك
                </a><br>
                <a href="https://www.facebook.com/groups/996807887969938" target="_blank" class="social-link">
                    <span class="fb-icon">f</span>  سوبا اللعوته او الواحة على الفيسبوك
                </a><br>
                <a href="https://www.facebook.com/groups/1749248661938624" target="_blank" class="social-link">
                    <span class="fb-icon">f</span> صفحة سوبا الاراضي على الفيسبوك
                </a><br>
                <a href="https://www.facebook.com/groups/537378892973931" target="_blank" class="social-link">
                    <span class="fb-icon">f</span> صفحة سوبا المحطة على الفيسبوك
                </a><br>
            </div>
        </div>

    </main>

    <footer style="background-color: rgb(12, 16, 16); padding: 15px; text-align: center; margin-top: 30px; color: white;">
        <a href="https://nsrdinibra.github.io/nsr_site/" target="_blank" style="color: #4db8ff;">صفحة باش مهندس نصرالدين سوبا</a>
        <p style="color: rgb(204, 229, 14); margin-top: 10px;">
            Author: Nasreldin Ibrahim Mohamed Blola<br>
            &copy; Rights reserved حقوق النشر محفوظة
        </p>
    </footer>

    <!-- ربط ملف الجافاسكريبت المستقل -->
    <script src="sob.js"></script>
</body>
</html>