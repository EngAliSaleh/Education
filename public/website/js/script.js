

let accountForm = document.querySelector('.account-form')
let btnc = document.querySelector('#account-btn') || ""
btnc.onclick = () => {
  accountForm.classList.add('active');
}



let navbar = document.querySelector('.header .navbar')
let menuBTn = document.querySelector('#menu-btn') || ""
menuBTn.onclick = () => {
  navbar.classList.add('active');
}
let closeNavbar = document.querySelector('#close-navbar')
if (closeNavbar) {
  closeNavbar.onclick = () => {
    navbar.classList.remove('active');
  };

}

let registerBtn = document.querySelector('.account-form .register-btn');
let loginBtn = document.querySelector('.account-form .login-btn') || "";
if (registerBtn) {
  registerBtn.onclick = () => {
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
    document.querySelector('.account-form .login-form').classList.remove('active');
    document.querySelector('.account-form .register-form').classList.add('active');
  };
}




loginBtn.onclick = () => {
  registerBtn.classList.remove('active');
  loginBtn.classList.add('active');
  document.querySelector('.account-form .login-form').classList.add('active');
  document.querySelector('.account-form .register-form').classList.remove('active');
};


let closeForm = document.querySelector('#close-form') || "";
closeForm.onclick = () => {
  accountForm.classList.remove('active');
};

var swiper = new Swiper(".home-slider", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  grabCursor: true,
});

var swiper = new Swiper(".home-courses-slider", {
  loop: true,
  grabCursor: true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".teachers-slider", {
  loop: true,
  grabCursor: true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".reviews-slider", {
  loop: true,
  grabCursor: true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".logo-slider", {
  loop: true,
  grabCursor: true,
  spaceBetween: 20,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});

let accordion = document.querySelectorAll('.faq .accordion-container .accordion');

accordion.forEach(acco => {
  acco.onclick = () => {
    accordion.forEach(dion => dion.classList.remove('active'));
    acco.classList.toggle('active');
  };
});

let loadBtn = document.querySelector('.load-more .btn');
if (loadBtn) {
  loadBtn.onclick = () => {
    document.querySelectorAll('.courses .box-container .hide').forEach(show => {
      show.style.display = 'block';
    });
    document.querySelector('.load-more .btn').style.display = 'none';
  };

}
