// ==========================================
// 1. اسم الموقع الخاص بك في Disqus
// ==========================================
// غيّر الكلمة التالية إلى الـ Shortname الخاص بك في Disqus (مثال: soba-kingdom)
const DISQUS_SHORTNAME = 'YOUR_SOBA_SHORTNAME';

// ==========================================
// 2. قائمة المقالات والأخبار
// ==========================================
const articlesData = [
    {
        id: "soba_article_1",
        title: "اكتشافات أثرية جديدة في سوبا شرق",
        date: "30 أكتوبر 2026",
        content: "تواصل البعثات الأثرية أعمال التنقيب في منطقة سوبا شرق، حيث تم الكشف عن بقايا معمارية تعود لفترة كنيسة سوبا القديمة وعاصمة مملكة علوة النوبية، مما يعزز الفهم لمكانتها التراثية والتاريخية العريقة."
    },
    {
        id: "soba_article_2",
        title: "تطوير الخدمات والمرافق في سوبا غرب",
        date: "25 أكتوبر 2026",
        content: "جهود مجتمعية ومحلية مكثفة لتحديث شبكات المياه والطرق الرئيسية لتسهيل الحركة والخدمات في منطقة سوبا غرب والشهداء، وتوفير التسهيلات الخدمية للأهالي."
    },
    {
        id: "soba_article_3",
        title: "تاريخ مملكة علوة وعاصمتها المجيدة",
        date: "15 أكتوبر 2026",
        content: "تعتبر سوبا العاصمة التاريخية لمملكة علوة التي قامت في وسط السودان وازدهرت للتجارة والعمائر الفخمة حتى سقوطها في عام 1504 م."
    }
];

// ==========================================
// 3. تهيئة التطبيق عند تحميل الصفحة
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    // إعداد التبويبات (Tabs)
    const buttons = document.querySelectorAll('.nav-btn');
    const tabs = document.querySelectorAll('.tab-content');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-target');

            buttons.forEach(btn => btn.classList.remove('active'));
            tabs.forEach(tab => tab.classList.remove('active'));

            button.classList.add('active');
            document.getElementById(target).classList.add('active');
        });
    });

    // تحميل قائمة المقالات والتحقق من بيانات الزائر
    loadArticlesList();
    checkSavedUser();
    loadMainDisqus();
});

// ==========================================
// 4. عرض المقالات والتعليقات المخصصة
// ==========================================

// عرض قائمة المقالات الكلية
function loadArticlesList() {
    const articlesList = document.getElementById('articles-list');
    if (!articlesList) return;

    articlesList.innerHTML = '';
    articlesData.forEach(art => {
        const card = document.createElement('div');
        card.className = 'article-card';
        card.style.cursor = 'pointer';
        card.onclick = () => openSingleArticle(art.id);
        
        card.innerHTML = `
            <h4>${art.title}</h4>
            <div class="article-date">📅 ${art.date}</div>
            <p>${art.content.substring(0, 110)}...</p>
            <span style="color: #007bff; font-weight: bold; font-size: 14px;">اقرأ المقال كاملاً وشارك بالتصويت والتعليق 💬</span>
        `;
        articlesList.appendChild(card);
    });
}

// فتح مقال منفرد وعرض تعليقات Disqus الخاصة به
function openSingleArticle(articleId) {
    const article = articlesData.find(a => a.id === articleId);
    if (!article) return;

    document.getElementById('articles-container').style.display = 'none';
    document.getElementById('single-article-view').style.display = 'block';

    document.getElementById('single-article-title').textContent = article.title;
    document.getElementById('single-article-date').textContent = `📅 ${article.date}`;
    document.getElementById('single-article-content').textContent = article.content;

    // تحميل أو تحديث Disqus للمقال المختار
    loadArticleDisqus(article.id, article.title);
}

// العودة للقائمة العامة للمقالات
function backToArticlesList() {
    document.getElementById('single-article-view').style.display = 'none';
    document.getElementById('articles-container').style.display = 'block';
}

// ==========================================
// 5. ربط Disqus
// ==========================================

// Disqus للصفحة الرئيسية
function loadMainDisqus() {
    if (document.getElementById('disqus_thread')) {
        var d = document, s = d.createElement('script');
        s.src = `https://${DISQUS_SHORTNAME}.disqus.com/embed.js`;
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    }
}

// Disqus للمقال المنفرد
function loadArticleDisqus(articleId, articleTitle) {
    const articleUrl = window.location.href.split('#')[0] + '#!' + articleId;

    if (window.DISQUS) {
        DISQUS.reset({
            reload: true,
            config: function () {
                this.page.identifier = articleId;
                this.page.url = articleUrl;
                this.page.title = articleTitle;
            }
        });
    } else {
        window.disqus_config = function () {
            this.page.identifier = articleId;
            this.page.url = articleUrl;
            this.page.title = articleTitle;
        };
        const d = document, s = d.createElement('script');
        s.src = `https://${DISQUS_SHORTNAME}.disqus.com/embed.js`;
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    }
}

// ==========================================
// 6. حفظ بيانات الزائر (LocalStorage)
// ==========================================
function loginUser() {
    const name = document.getElementById('user-name').value.trim();
    const contact = document.getElementById('user-contact').value.trim();

    if (name) {
        localStorage.setItem('soba_user_name', name);
        localStorage.setItem('soba_user_contact', contact);
        checkSavedUser();
    } else {
        alert('يرجى إدخال الاسم على الأقل.');
    }
}

function logoutUser() {
    localStorage.removeItem('soba_user_name');
    localStorage.removeItem('soba_user_contact');
    document.getElementById('login-form').style.display = 'block';
    document.getElementById('user-welcome').style.display = 'none';
}

function checkSavedUser() {
    const savedName = localStorage.getItem('soba_user_name');
    if (savedName) {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('welcome-message').textContent = `مرحباً بك: ${savedName}`;
        document.getElementById('user-welcome').style.display = 'block';
    }
}
