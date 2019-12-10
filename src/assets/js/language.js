var arrLang = {
    "en-gb": {
        "signIn":"Sign in",
        "registration": "Registration",
        "RegistrationForm": "Registration Form",
        "signOut": "Sign out",
        "PreferLanguage": "Choose Your Prefer Language",
        "fillForm": "Fill user form",
        "UserLogin": "Enter Your Name",
        "loginHelp": "Login must be from 3 to 20 characters length. You can use only english letters and digits.",
        "UserPassword": "Password",
        "passwordHelp": "Password must be from 6 to 20 english letters and digits.",
        "emailAddress": "Email address",
        "attachFile": "Attach file",
        "userSubmit": "Submit",
        "emailHelp": "We'll never share your email with anyone else.",
        "attachFileHelp": "Format of image must be GIF, PNG or JPG",
        "profile": "Profile",
        "CsrfError": "Old session. Please back the previous page",
        "AllFieldsRequired": "Please check all fields",
        "UserNotExist": "Login or password isn`t correct",
        "EmailExists": "This email have been already using",
        "UserExist":"This username has been already using",
        "BigPic":"So big image you attached",
        "badMimeType":"You can use only gif, jpg and png images"
    },
    "ru-ru": {
        "signIn":"Войти",
        "RegistrationForm": "Регистрационная форма",
        "registration": "Зарегистрироваться",
        "signOut": "Выйти",
        "PreferLanguage": "Выберите предпочитаемый язык",
        "fillForm": "Пожалуйста, заполните форму",
        "UserLogin": "Введите Ваше имя",
        "loginHelp": "Логин должен быть от 3 до 20 английских букв или цифр",
        "UserPassword": "Пароль",
        "passwordHelp": "Пароль должен быть от 6 до 20 английских букв или цифр",
        "emailAddress": "Электронная почта",
        "attachFile": "Прикрепите изображение",
        "userSubmit": "Отправить",
        "emailHelp": "Ваш электронный адресс будет сохранен в секрете",
        "attachFileHelp": "Формат изображения должен быть GIF, PNG или JPG",
        "profile": "Станица",
        "CsrfError": "Устаревшая сессия. Пожалуйста вернитесь на предыдущую страницу",
        "AllFieldsRequired": "Пожалуйста, проверьте заполнение всех полей формы",
        "UserNotExist": "Неверный логин или пароль",
        "EmailExists": "Эта почта уже использована при регистрации",
        "UserExist":"Этот логин уже используется",
        "BigPic":"Слишком большой размер изображения",
        "badMimeType":"Вы можете использовать только gif, jpg и png изображения"
    }
};

$(document).ready(function () {
    // The default language is English
    var lang = "en-gb";
    $(".lang").each(function (index, element) {
        $(this).text(arrLang[lang][$(this).attr("key")]);
    });
});

// get/set the selected language
$(".translate").click(function () {
    var lang = $(this).attr("id");

    $(".lang").each(function (index, element) {
        $(this).text(arrLang[lang][$(this).attr("key")]);
    });
});