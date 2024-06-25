document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const themeToggleIcon = themeToggleButton.querySelector('.fa');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-theme');
        themeToggleIcon.classList.remove('fa-toggle-off');
        themeToggleIcon.classList.add('fa-toggle-on');
    } else {
        document.body.classList.add('light-theme');
        themeToggleIcon.classList.remove('fa-toggle-on');
        themeToggleIcon.classList.add('fa-toggle-off');
    }
        themeToggleButton.addEventListener('click', () => {
        if (document.body.classList.contains('light-theme')) {
            document.body.classList.remove('light-theme');
            document.body.classList.add('dark-theme');
            themeToggleIcon.classList.remove('fa-toggle-off');
            themeToggleIcon.classList.add('fa-toggle-on');
            localStorage.setItem('theme', 'dark');
        } else {
            document.body.classList.remove('dark-theme');
            document.body.classList.add('light-theme');
            themeToggleIcon.classList.remove('fa-toggle-on');
            themeToggleIcon.classList.add('fa-toggle-off');
            localStorage.setItem('theme', 'light');
        }
    });
});
