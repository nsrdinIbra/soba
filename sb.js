document.addEventListener('DOMContentLoaded', () => {

    // 1. التنقل بين الأزرار والتبويبات
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

    // 2. تحميل المقالات في صفحة الأخبار والمجتمع
    loadArticles();

    // 3. التحقق من بيانات المستخدم المحفوظة
    checkSavedUser();
});

// نموذج مقالات لمشروع سوبا
function loadArticles() {
    const articlesList = document.getElementById('articles-list');
    
    const articles = [
        {
            title: "اكتشافات أثرية جديدة في سوبا شرق",
            date: "30 أكتوبر 2026",
            content: "تواصل البعثات الأثرية أعمال التنقيب في منطقة سوبا شرق، حيث تم الكشف عن بقايا معمارية تعود لفترة كنيسة سوبا القديمة وعاصمة مملكة علوة."
        },
        {
            title: "تطوير الخدمات والمرافق في سوبا غرب",
            date: "25 أكتوبر 2026",
            content: "جهود مجتمعية ومحلية لتحديث شبكات المياه والطرق الرئيسية لتسهيل الحركة والخدمات في منطقة سوبا غرب والشهداء."
        }
    ];

    if (!articlesList) return;

    articlesList.innerHTML = '';
    articles.forEach(art => {
        const card = document.createElement('div');
        card.className = 'article-card';
        card.innerHTML = `
            <h4>${art.title}</h4>
            <div class="article-date">📅 ${art.date}</div>
            <p>${art.content}</p>
        `;
        articlesList.appendChild(card);
    });
}

// حفظ بيانات المستخدم محلياً
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

// 4. تحميل سكربت Disqus لتضمين التعليقات
(function() {
    var d = document, s = d.createElement('script');
    // غيّر YOUR_SOBA_SHORTNAME إلى Shortname الخاص بمشروع سوبا في Disqus
    s.src = 'https://YOUR_SOBA_SHORTNAME.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();