<?php

function randomImage($type = null)
{
    switch ($type) {
        case 'avatars':

            $images = avatars();
            break;

        case 'articles':

            $images = articles();
            break;

        case 'courses':

            $images = courses();
            break;

        case 'bank_transfer':

            $images = bank_transfers();
            break;

        default:

            $images = books();

    }
    $random_image = array_rand($images, 1);

    return $images[$random_image];
}

function avatars()
{
    return [
        'https://i.ibb.co/DRxN97W/6-69898-physical-education-teacher-clip-art-teacher-1370-2400.jpg',
        'https://i.ibb.co/YhTw0wR/7-512.png',
        'https://i.ibb.co/syD5b3b/136-1369892-avatar-people-person-business-user-man-character-avatar.png',
        'https://i.ibb.co/mFp9ysB/189-1892495-flat-avatar-i-can-make-your-cute-flat-avatar-if-you-illustration.jpg',
        'https://i.ibb.co/JCLFw8j/586eea98be949-thumb900.jpg',
        'https://i.ibb.co/Pj57NwJ/20131010-020328-4875-Admin.png',
        'https://i.ibb.co/56mfccB/Avatar-girls-icon-vector-Woman-icon-illustration-Face-of-female-icons-cartoon-style-Isolated-woman-a.jpg',
        'https://i.ibb.co/9rYqR0D/72201674-beautiful-brunette-girl-with-magnificent-curly-brown-dark-chocolhair-gathered-at-the-nape-a.jpg',
        'https://i.ibb.co/jghyQts/72296966-beautiful-brunette-girl-with-long-dark-chocolate-color-hair-arranged-in-a-high-evening-hair.jpg',
        'https://i.ibb.co/jMPbdDy/Vector-Girl-icon-Woman-avatar-face-icon-Cartoon-style.jpg',
        'https://i.ibb.co/6BHkZbq/Vector-Girl-icon-Woman-avatar-face-icon-Cartoon-style.jpg',
        'https://i.ibb.co/VvZ8LpB/76657961-cute-young-brunette-woman-portrait-for-avatar-isolated-on-a-white-background.jpg',
        'https://i.ibb.co/Ry7rpxF/89039392-lovely-girl-with-curly-brown-hair-portrait-for-avatar-isolated-on-a-white-background.jpg',
        'https://i.ibb.co/kXN5sYb/89039394-cute-young-brunette-woman-with-short-haircut-in-pink-blouse-portrait-for-avatar-isolated-on.jpg',
        'https://i.ibb.co/Npm2vTc/89039455-cute-young-brunette-woman-in-red-portrait-for-avatar-isolated-on-a-white-background.jpg',
        'https://i.ibb.co/TDybVGf/elegant-businessman-avatar-character-vector-illustration-design.jpg',
        'https://i.ibb.co/g4BR50S/avatar.png',
        'https://i.ibb.co/4YLgKsP/beautiful-brunette-girl-brown-straight-hair-gathered-two-ponytail-portrait-beautiful-brunette-girl-b.jpg',
        'https://i.ibb.co/HXQHhkv/Business-man-guide-285004.png',
        'https://i.ibb.co/582y64w/businessman-character-avatar-icon-vector-illustration-design.jpg',
        'https://i.ibb.co/MBsRrd8/flat-business-woman-user-profile-avatar-icon-vector-4334111.jpg',
        'https://i.ibb.co/5cBWpQJ/hxa-800.jpg',
        'https://i.ibb.co/prpxvkq/myAvatar.png',
        'https://i.ibb.co/mX7wPkY/picture-3231879-1432890058.png',
        'https://i.ibb.co/28skGHV/profile-pic.jpg',
        'https://i.ibb.co/mXHCm6v/stock-vector-asian-boy-smiling-male-avatar-cartoon-guy-character-facial-expression-smile-vector-illu.jpg',
        'https://i.ibb.co/TK4LkjX/user.png',
    ];
}

function books()
{
    return [
        'https://storage.googleapis.com/sumaya369-production/2021/05/82f2cafa--%D8%A7%D8%A8%D9%82-%D8%A5%D9%8A%D8%AC%D8%A7%D8%A8%D9%8A%D8%A7%D9%8B-%D9%85%D9%88%D9%82%D8%B9.png',
        'https://sumaya369.net/wp-content/uploads/2020/06/%D8%BA%D9%84%D8%A7%D9%81-%D9%83%D8%AA%D8%A7%D8%A8-%D8%A7%D9%84%D8%A8%D8%A7%D8%A8-%D8%A7%D9%84%D8%AE%D9%84%D9%81%D9%8A-%D9%85%D9%88%D9%82%D8%B9.png',
        'https://sumaya369.net/wp-content/uploads/2020/06/%D8%BA%D9%84%D8%A7%D9%81-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AD%D8%AF%D8%AB%D9%86%D9%8A-2-%D9%85%D9%88%D9%82%D8%B9.png',
        'https://sumaya369.net/wp-content/uploads/2020/06/%D8%BA%D9%84%D8%A7%D9%81-%D9%83%D8%AA%D8%A7%D8%A8-%D9%83%D9%8A%D9%81-%D8%AA%D8%AA%D9%82%D9%86-%D9%84%D8%B9%D8%A8%D8%A9-%D8%A7%D9%84%D8%AD%D9%8A%D8%A7%D8%A9-%D9%85%D9%88%D9%82%D8%B9.png',
        'https://sumaya369.net/wp-content/uploads/2020/11/%D8%BA%D9%84%D8%A7%D9%81-%D9%83%D8%AA%D8%A7%D8%A8-%D8%A7%D9%81%D8%B9%D9%84%D9%87%D8%A7-%D9%85%D9%88%D9%82%D8%B9.png',
        'https://sumaya369.net/wp-content/uploads/2020/06/%D8%BA%D9%84%D8%A7%D9%81-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AD%D8%AF%D8%AB%D9%86%D9%8A-%D9%81%D9%82%D8%A7%D9%841-%D9%85%D9%88%D9%82%D8%B9.png',
    ];
}

function articles()
{
    return [
        'https://storage.googleapis.com/sumaya369-production/2021/12/ca508283-137-%D8%AA%D9%84%D8%B9%D8%A8-scaled.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/fab6477a-precious-little-newborn-boy-having-deep-sleep-day-mother-chest-blue-baby-sling-mom-kissing-baby-head-feeling-relaxed-delight-family-concept.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/ee15eb33-holding-hands.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/f323c5eb-creative-arrangement-world-book-day.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/e8bc8c09-business-success-concept-wooden-table-top-view-hands-protecting-wooden-figures-people.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/a15329fb-affectionate-woman-shows-heart-gesture-says-be-my-valentine-boyfriend-confesses-love.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/3d3ef6fc-senior-man-spectacles-presses-hand-chest-has-heart-attack-suffers-from-unbearable-pain-closes-eyes-wears-optical-glasses-poses-against-blue-wall.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/222a0d74-question-mark-wooden-cube-computer-keyboard-with-blurred-background-shallow-depth-field.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/10/180e0d2f-decision-life-business-concept-undecided-person-standing-forward-left-right-arrow-direction-top-view.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/09/1e1154c9-43059.jpg',
        'https://storage.googleapis.com/sumaya369-production/2021/09/0c5388ba-cement-street-financial-downtown-shanghai-travel.jpg',
    ];
}

function bank_transfers()
{
    return [
        'https://i.ibb.co/YRR7NRq/large.png',
        'https://i.ibb.co/0hnkTYK/Screen-Shot-2020-04-09-at-10-53-36-PM.png',
    ];
}

function courses()
{
    return [
        'https://sumaya369.net/wp-content/uploads/2020/03/%D8%A7%D9%84%D8%BA%D8%B6%D8%A8-%D8%AC%D8%AF%D9%8A%D8%AF-%D9%85%D9%88%D9%82%D8%B9-300x197.png',
        'https://storage.googleapis.com/sumaya369-production/2021/11/6ad32322--%D8%A7%D9%84%D9%82%D8%B5%D8%A9-%D9%85%D9%88%D9%82%D8%B9-500x338.png',
        'https://storage.googleapis.com/sumaya369-production/2021/11/d4bda92d--%D8%AC%D8%AF%D9%8A%D8%AF-500x337.png',
        'https://storage.googleapis.com/sumaya369-production/2021/11/2f8ae5a4--%D8%A7%D9%84%D8%A7%D8%A8%D9%8A%D8%B62021-%D9%85%D9%88%D9%82%D8%B9-500x338.png',
        'https://sumaya369.net/wp-content/uploads/2020/03/%D8%A7%D9%84%D8%AB%D9%82%D8%A9-%D8%A8-%D8%A7%D9%84%D9%86%D9%81%D8%B3-%D9%85%D9%88%D9%82%D8%B9-300x197.png',
        'https://sumaya369.net/wp-content/uploads/2020/03/%D8%A7%D9%84%D8%AE%D9%88%D9%81-%D8%AC%D8%AF%D9%8A%D8%AF-%D9%85%D9%88%D9%82%D8%B9-300x197.png',
        'https://sumaya369.net/wp-content/uploads/2020/04/%D8%A8%D8%A7%D9%82%D8%A9-%D8%A7%D9%84%D9%85%D8%B4%D8%A7%D8%B9%D8%B1-%D9%85%D9%88%D9%82%D8%B9-300x197.png',
        'https://sumaya369.net/wp-content/uploads/2020/03/%D8%A7%D9%84%D8%AA%D8%A3%D9%86%D9%8A%D8%A8-%D8%AC%D8%AF%D9%8A%D8%AF-%D9%85%D9%88%D9%82%D8%B9-300x198.png',
        'https://sumaya369.net/wp-content/uploads/2020/03/%D8%A7%D9%84%D8%AD%D8%B2%D9%86-%D8%AC%D8%AF%D9%8A%D8%AF-%D9%85%D9%88%D9%82%D8%B9-300x204.png',
    ];
}
