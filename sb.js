// ==========================================
// 1. اسم الموقع الخاص بك في Disqus
// ==========================================
const DISQUS_SHORTNAME = 'soba-kh';

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
    const buttons = document.querySelectorAll('.nav-btn');
    const tabs = document.querySelectorAll('.tab-content');

    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            // إذا كان الزر خاص بالقائمة المنسدلة، لا تقم بتغيير التبويب
            if (button.classList.contains('dropdown-toggle')) {
                return;
            }

            const target = button.getAttribute('data-target');
            if (!target) return;

            buttons.forEach(btn => btn.classList.remove('active'));
            tabs.forEach(tab => tab.classList.remove('active'));

            button.classList.add('active');
            
            const targetTab = document.getElementById(target);
            if (targetTab) {
                targetTab.classList.add('active');
            }

            // إغلاق القائمة المنسدلة عند اختيار عنصر فرعي
            const dropdownMenu = document.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.remove('show');
            }
        });
    });

    // إغلاق القائمة المنسدلة عند النقر في أي مكان خارجها
    window.addEventListener('click', function(e) {
        const dropdownContainer = document.getElementById('servicesDropdown');
        if (dropdownContainer && !dropdownContainer.contains(e.target)) {
            const dropdownMenu = document.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.remove('show');
            }
        }
    });

    loadArticlesList();
    checkSavedUser();
    loadMainDisqus();
});

// ==========================================
// 4. دالة فتح وإغلاق القائمة المنسدلة بالنقر
// ==========================================
function toggleDropdown(event) {
    event.stopPropagation();
    const dropdownMenu = document.querySelector('.dropdown-menu');
    if (dropdownMenu) {
        dropdownMenu.classList.toggle('show');
    }
}

// ==========================================
// 5. عرض المقالات والتعليقات المخصصة
// ==========================================
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

function openSingleArticle(articleId) {
    const article = articlesData.find(a => a.id === articleId);
    if (!article) return;

    document.getElementById('articles-container').style.display = 'none';
    document.getElementById('single-article-view').style.display = 'block';

    document.getElementById('single-article-title').textContent = article.title;
    document.getElementById('single-article-date').textContent = `📅 ${article.date}`;
    document.getElementById('single-article-content').textContent = article.content;

    loadArticleDisqus(article.id, article.title);
}

function backToArticlesList() {
    document.getElementById('single-article-view').style.display = 'none';
    document.getElementById('articles-container').style.display = 'block';
}

// ==========================================
// 6. ربط Disqus
// ==========================================
function loadMainDisqus() {
    if (document.getElementById('disqus_thread')) {
        var d = document, s = d.createElement('script');
        s.src = `https://${DISQUS_SHORTNAME}.disqus.com/embed.js`;
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    }
}

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
// 7. حفظ بيانات الزائر (LocalStorage)
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
