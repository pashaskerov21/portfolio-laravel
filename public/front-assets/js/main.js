if (document.querySelector('.menu-button')) {
    let menuButton = document.querySelector('.menu-button');
    menuButton.addEventListener('click', function () {
        menuButton.classList.toggle('active');
    })
}

if (document.querySelector('.theme-button')) {
    let themeButton = document.querySelector('.theme-button');
    let body = document.querySelector('body');
    themeButton.addEventListener('click', function () {
        themeButton.classList.toggle('active');
        body.classList.toggle('dark')
    })
}

if (document.querySelector('.general-navbar .nav-links a')) {
    let generalNavLinks = document.querySelectorAll('.general-navbar .nav-links a');
    let delay = 0;
    for (let i = 0; i < generalNavLinks.length; i++) {
        generalNavLinks[i].style.animationDelay = delay + 's';
        delay = delay + 0.2;
    }
}


if (document.querySelector('header')) {
    let header = document.querySelector('.general-navbar');
    window.addEventListener('scroll', function () {
        if (scrollY > 300) {
            header.classList.add('fixed-top');
        } else {
            header.classList.remove('fixed-top');
        }
    })
}

if (document.querySelector(".page-scroll-button")) {
    let pageScrollButton = document.querySelector(".page-scroll-button");
    window.addEventListener("scroll", function () {
        if (scrollY > 300) {
            pageScrollButton.classList.remove("d-none");
        } else {
            pageScrollButton.classList.add("d-none")
        }
    });
    pageScrollButton.addEventListener("click", function () {
        window.scrollTo(0, 0);
    })
}

if (document.querySelector('.mail-toast')) {
    let mailToast = document.querySelector('.mail-toast');
    let mailToastButton = mailToast.querySelector('button');
    mailToastButton.addEventListener('click', function () {
        mailToast.classList.add('d-none');
    })

    if (mailToast.classList.contains('d-none') == false) {
        setTimeout(() => {
            mailToast.classList.add('d-none')
        }, 2000)
    }
}


let contactForm = document.querySelector('.contact-form');
contactForm.addEventListener('submit', function (e) {
    if (!contactForm.checkValidity()) {
        e.preventDefault();
        e.stopPropagation()
        contactForm.classList.add('was-validated')
    } else {
        contactForm.classList.remove('was-validated')
    }
})


let filterButtons = document.querySelectorAll('.project-filter-buttons button');
let projects = document.querySelectorAll('.project-col');

filterButtons[0].classList.add('active');
filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
        let categoryID = button.getAttribute("data-id");
        for(let i = 0; i < filterButtons.length; i++){
            filterButtons[i].classList.remove('active')
        }
        button.classList.add('active');

        if(categoryID == 'all'){
            for(let i = 0; i < projects.length; i++){
                projects[i].classList.remove('d-none')
            }
        }else{
            let filteredProjects = Array.from(projects).filter((project) => project.getAttribute('data-category-id') == categoryID);
            for(let i = 0; i < projects.length; i++){
                projects[i].classList.add('d-none')
            }
            for(let i = 0; i < filteredProjects.length; i++){
                filteredProjects[i].classList.remove('d-none')
            }
        }
    })
    
})