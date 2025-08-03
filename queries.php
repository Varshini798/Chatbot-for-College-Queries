<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Chatbot - Questions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .dropdown-menu {
            display: none;
        }
        .dropdown-menu.show {
            display: block;
        }
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-100 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <button id="menu-button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700" onclick="toggleDropdown()">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <img alt="Logo" class="h-8 w-8 ml-4" height="50" src="https://th.bing.com/th/id/OIP.zwWv71MTy75P8z3KD6okZwHaFj?rs=1&pid=ImgDetMain" width="50"/>                        
                        <span class="ml-2 text-3xl font-bold text-gray-800">Chatbot</span>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="home.php">Home</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="category.php">Category</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="about.php">About</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="contact.php">Contact Us</a>
                    </div>
                </div>
                <div class="flex items-center">
                <?php 
                if (isset($_SESSION['valid'])): ?>
                    <a class="text-white bg-green-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="text-white bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium" href="login.php">Login</a>
                    <a class="ml-4 text-white bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-base font-medium" href="register.php">Register</a>
                <?php endif; ?>
                </div>
            </div>
            <div id="dropdown-menu" class="dropdown-menu absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                    <a href="home.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Home</a>
                    <a href="category.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Categories</a>
                    <a href="history.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">History</a>
                    <a href="admin.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Admin</a>
                    <a href="about.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">About</a>
                    <a href="contact.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Contact Us</a>
                </div>
            </div>
        </nav>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 id="category-heading" class="text-3xl font-bold text-gray-800 text-center"></h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="question-container">
                <!-- Questions will be dynamically generated here -->
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Chat</h2>
            <div class="mt-8 bg-pink-100 p-6 rounded-lg shadow-md">
                <div id="chat-box" class="h-64 overflow-y-auto border border-gray-300 p-4 rounded-lg">
                    <!-- Chat messages will appear here -->
                </div>
                <div class="mt-4 flex">
                    <input id="chat-input" type="text" class="flex-1 border border-gray-300 p-2 rounded-lg" placeholder="Type your question number...">
                    <button id="send-button" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg">Send</button>
                </div>
            </div>
        </div>
        <footer class="bg-blue-200 shadow-md mt-12">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Follow Us</h2>
                        <div class="mt-4 flex space-x-6">
                            <a class="text-blue-500 hover:text-gray-700" href="https://www.facebook.com/jntuaceajp/">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="text-blue-500 hover:text-gray-700" href="https://twitter.com/ejntua">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="text-blue-500 hover:text-gray-700" href="https://www.instagram.com/jntua_official/?hl=en">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a class="text-blue-500 hover:text-gray-700" href="https://in.linkedin.com/company/jntua-cea">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 border-t border-black-200 pt-8 text-center text-blue-500">
                    © 2025 AI Chatbot. All rights reserved.
                </div>
            </div>
        </footer>
        <script>
            const categories = {
                admissions: {
                    questions: [
                        'What are the admission requirements?',
                        'How do I apply for admission?',
                        'What is the application deadline?',
                        'What documents are required for admission?',
                        'How can I check my application status?',
                        'What are the admission criteria?',
                        'Can I apply for multiple programs?',
                        'What is the admission process for international students?'
                    ],
                    answers: [
                        'The admission requirements typically include a valid score in the relevant entrance examination (like EAMCET for undergraduate programs), completion of the required educational qualifications, and submission of necessary documents. For specific details, please refer to the <a href="https://jntuacep.ac.in" target="_blank" >Click here</a>.',
                        'You can apply for admission through the official website of JNTUCEP. The application process usually involves filling out an online application form, uploading required documents, and paying the application fee. For detailed steps, visit the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
                        'The application deadline varies each year. It is usually announced on the official website. Please check the <a href="https://jntuacep.ac.in">Click here</a> for the most current deadlines.',
                        'Required documents typically include: Mark sheets of previous educational qualifications, Entrance exam scorecard, Transfer certificate, Migration certificate (if applicable), Caste certificate (if applicable), Recent passport-sized photographs. For a complete list, refer to the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
                        'You can check your application status by logging into the admission portal on the JNTUCEP website using your credentials. For more information, visit the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
                        'Admission criteria generally include performance in the entrance examination, academic qualifications, and reservation policies as per government norms. For specific criteria, please refer to the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
                        'Yes, you can apply for multiple programs, but you will need to fill out separate application forms for each program. For more details, check the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
                        'The admission process for international students may differ slightly and usually involves additional documentation, such as proof of English proficiency and equivalency certificates. For detailed information, please visit the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
                    ]
                },
                courses: {
    questions: [
        'What undergraduate courses are offered?',
        'What postgraduate courses are available?',
        'How do I enroll in a course?',
        'What are the prerequisites for courses?',
        'Can I take courses online?',
        'What is the duration of each course?',
        'Are there any specializations available?',
        'How do I get course materials?',
        'What is the process for course withdrawal?',
        'Are there any internships or practical training included in the courses?'
    ],
    answers: [
        'The undergraduate courses offered include B.Tech in various branches such as CSE, ECE, EEE, ME, and Civil Engineering. For more details, please visit the <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Postgraduate courses available include M.Tech in various specializations and MBA. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To enroll in a course, you need to complete the online application process through the official website. For detailed steps, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The prerequisites for courses typically include a valid score in the relevant entrance examination and completion of previous educational qualifications. For specifics, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, many courses can be taken online. For more information on online courses, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The duration of each undergraduate course is typically four years, while postgraduate courses usually last two years. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are specializations available in various fields for both undergraduate and postgraduate courses. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can get course materials through the online portal or directly from the department. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for course withdrawal involves submitting a formal request to the administration. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, internships and practical training are included in many courses. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
campusFacilities: {
    questions: [
        'Is there a library on campus?',
        'Are there sports facilities?',
        'Is there a health center?',
        'Are there study rooms available?',
        'What are the operating hours of campus facilities?',
        'Is there Wi-Fi available on campus?',
        'Are there any hostels available for students?',
        'What transportation facilities are provided?',
        'Is there a computer lab on campus?'
    ],
    answers: [
        'Yes, there is a well-equipped library on campus that provides access to a wide range of books and online resources. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are various sports facilities available, including fields for cricket, football, and indoor sports. For details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there is a health center on campus that provides medical assistance to students. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are study rooms available for students to use for group studies and individual work. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The operating hours of campus facilities vary, but most are open from early morning until late evening. For specifics, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, Wi-Fi is available on campus for students and staff. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are hostels available for both male and female students. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Transportation facilities include buses that connect the campus to nearby areas. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there is a computer lab on campus equipped with modern computers and software for student use. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
events: {
    questions: [
        'What events are held on campus?',
        'How can I participate in events?',
        'Are there any upcoming events?',
        'How do I register for events?',
        'Can I volunteer for events?',
        'What types of events are organized?',
        'Are events open to the public?',
        'How can I get updates about events?',
        'Are there any competitions held during events?',
        'What is the process for organizing an event?'
    ],
    answers: [
        'The events held on campus include technical fests, cultural programs, workshops, and seminars. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can participate in events by registering online or at the event venue. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are upcoming events scheduled throughout the year. For the latest updates, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To register for events, you need to fill out the registration form available on the official website. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, you can volunteer for events by signing up through the official website or contacting the event coordinators. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The types of events organized include academic conferences, cultural festivals, sports events, and guest lectures. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Some events are open to the public, while others are restricted to students. For specifics, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can get updates about events through the official website, social media channels, and campus announcements. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are various competitions held during events, including technical contests, cultural performances, and sports competitions. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for organizing an event typically involves submitting a proposal to the administration and coordinating with various departments. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
scholarships: {
    questions: [
        'What scholarships are available?',
        'How do I apply for scholarships?',
        'What are the eligibility criteria?',
        'When is the scholarship application deadline?',
        'Can I apply for multiple scholarships?',
        'How are scholarships awarded?',
        'What documents are required for scholarship applications?',
        'Is there a scholarship for international students?',
        'Are there merit-based scholarships?',
        'What is the process for renewing a scholarship?'
    ],
    answers: [
        'The scholarships available include merit-based scholarships, need-based scholarships, and government-sponsored scholarships. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To apply for scholarships, you need to fill out the scholarship application form available on the official website. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The eligibility criteria vary by scholarship but generally include academic performance, financial need, and other specific requirements. For specifics, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The scholarship application deadline is typically announced on the official website and may vary each year. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, you can apply for multiple scholarships, but you must meet the eligibility criteria for each. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Scholarships are awarded based on academic performance, financial need, and other criteria set by the scholarship committee. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The documents required for scholarship applications typically include academic transcripts, income certificates, and identification proof. For specifics, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are scholarships specifically for international students. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, merit-based scholarships are available for students who achieve high academic performance. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for renewing a scholarship usually involves submitting updated academic records and a renewal application. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
placements: {
    questions: [
        'What companies visit for campus placements?',
        'What is the average salary package offered?',
        'How can I prepare for campus placements?',
        'What is the placement process?',
        'Are there any placement training programs available?',
        'What percentage of students get placed?',
        'How can I access placement statistics?',
        'Is there support for internships?',
        'What documents do I need for placement interviews?',
        'Can I participate in placements if I have backlogs?'
    ],
    answers: [
        'Various companies from different sectors visit for campus placements, including IT, core engineering, and consulting firms. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The average salary package offered varies by year and branch, but it typically ranges from INR 3 LPA to INR 10 LPA. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To prepare for campus placements, you should focus on your technical skills, resume building, and interview preparation. For tips, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The placement process usually involves registration, aptitude tests, technical interviews, and HR interviews. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are placement training programs available that help students prepare for interviews and improve their skills. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The percentage of students getting placed varies each year, but it is generally around 70-80%. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can access placement statistics through the official placement cell or the college website. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there is support for internships, and many companies offer internship opportunities to students. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You typically need to bring your resume, academic transcripts, and any other relevant documents for placement interviews. For specifics, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, students with backlogs can participate in placements, but it may depend on the companys eligibility criteria. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
extracurricularActivities: {
    questions: [
        'What extracurricular activities are offered?',
        'How can I join a club?',
        'Are there sports teams?',
        'What events do clubs organize?',
        'Is there a student government?',
        'How do I start a new club?',
        'Are there any competitions?',
        'What are the benefits of joining extracurricular activities?',
        'How can I find out about upcoming events?',
        'Are there any cultural activities organized?',
        'Can I participate in multiple clubs?'
    ],
    answers: [
        'The extracurricular activities offered include various clubs, sports teams, cultural events, and technical fests. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To join a club, you need to fill out a membership form and attend the introductory meeting. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are sports teams for various sports such as cricket, football, basketball, and athletics. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Clubs organize events such as workshops, seminars, cultural festivals, and competitions. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there is a student government that represents student interests and organizes events. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To start a new club, you need to submit a proposal to the student affairs office and gather interested members. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are competitions held throughout the year, including sports competitions and cultural contests. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The benefits of joining extracurricular activities include skill development, networking opportunities, and personal growth. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can find out about upcoming events through the official website, social media, and campus announcements. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are various cultural activities organized throughout the year, including dance, music, and drama events. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, you can participate in multiple clubs as long as you can manage your time effectively. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
financialAid: {
    questions: [
        'What types of financial aid are available?',
        'How do I apply for financial aid?',
        'What is the financial aid application deadline?',
        'Are there grants available?',
        'Can I receive financial aid if I am an international student?',
        'How is financial aid awarded?',
        'What documents are needed for financial aid?',
        'Can I appeal a financial aid decision?',
        'Are there scholarships available for financial aid?',
        'What is the process for renewing financial aid?'
    ],
    answers: [
        'The types of financial aid available include scholarships, grants, and loans. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To apply for financial aid, you need to complete the financial aid application form available on the official website. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The financial aid application deadline is typically announced on the official website and may vary each year. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are grants available for students based on financial need and academic performance. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, international students can receive financial aid, but eligibility may vary. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Financial aid is awarded based on factors such as financial need, academic performance, and specific eligibility criteria set by the institution. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The documents needed for financial aid typically include income statements, academic transcripts, and identification proof. For specifics, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, you can appeal a financial aid decision if you believe there are extenuating circumstances. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are scholarships available that can be considered a form of financial aid. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for renewing financial aid usually involves submitting updated financial information and a renewal application. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
hostelFacilities: {
    questions: [
        'What types of hostels are available?',
        'How can I apply for hostel accommodation?',
        'What are the hostel fees?',
        'Are there any facilities provided in the hostels?',
        'Is there a mess facility available?',
        'What are the rules and regulations for hostel residents?',
        'Are there separate hostels for boys and girls?',
        'What is the process for changing hostels?',
        'Is Wi-Fi available in the hostels?',
        'What should I bring when moving into the hostel?'
    ],
    answers: [
        'The types of hostels available include separate hostels for boys and girls, with options for single and shared accommodations. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'To apply for hostel accommodation, you need to fill out the hostel application form available on the official website. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The hostel fees vary depending on the type of accommodation and facilities provided. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, hostels provide various facilities such as furnished rooms, common areas, and laundry services. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there is a mess facility available that serves meals to hostel residents. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The rules and regulations for hostel residents include maintaining discipline, respecting fellow residents, and adhering to the hostel timings. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, there are separate hostels for boys and girls to ensure a safe and comfortable living environment. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for changing hostels typically involves submitting a request to the hostel warden and providing valid reasons. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, Wi-Fi is available in the hostels for residents. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'When moving into the hostel, you should bring essential items such as bedding, toiletries, and personal belongings. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
},
collegeFaculty: {
    questions: [
        'Who are the faculty members in the Computer Science Engineering department?',
        'What qualifications do the faculty members have?',
        'How can I contact my faculty advisor?',
        'Are there any guest lectures conducted by industry experts?',
        'What is the student-to-faculty ratio?',
        'How can I find faculty research interests?',
        'Are there any faculty members involved in student clubs?',
        'What support do faculty provide for academic projects?',
        'How often do faculty hold office hours?',
        'What is the process for faculty evaluation?'
    ],
    answers: [
        'The faculty members in the Computer Science Engineering department include experienced professors and lecturers. For more details, please visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Faculty members typically hold advanced degrees such as M.Tech or Ph.D. in their respective fields. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can contact your faculty advisor through the official email or during office hours. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, guest lectures are often conducted by industry experts to provide insights into current trends. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The student-to-faculty ratio is generally maintained to ensure personalized attention, typically around 15:1. For more details, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'You can find faculty research interests on the department’s webpage or faculty profiles. For more information, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Yes, many faculty members are involved in student clubs and organizations, providing mentorship and guidance. For more details, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Faculty provide support for academic projects through guidance, resources, and feedback. For more information, check <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'Faculty typically hold office hours once a week for student consultations. For more details, see <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.',
        'The process for faculty evaluation usually involves student feedback and performance assessments. For more information, visit <a href="https://jntuacep.ac.in" target="_blank">Click here</a>.'
    ]
}
        
            };

            /// Function to get the selected category from the URL
            function getSelectedCategory() {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get('category');
            }

            // Function to display questions based on the selected category
            function displayQuestions() {
                const selectedCategory = getSelectedCategory();
                const questionContainer = document.getElementById('question-container');
                const categoryHeading = document.getElementById('category-heading');

                if (categories[selectedCategory]) {
                    categoryHeading.textContent = selectedCategory.charAt(0).toUpperCase() + selectedCategory.slice(1);
                    const questions = categories[selectedCategory].questions;

                    questions.forEach((question, index) => {
                        const button = document.createElement('button');
                        button.onclick = () => sendQuestion(index + 1);
                        button.className = 'block p-6 bg-white rounded-lg shadow-md hover:bg-gray-100';
                        button.innerHTML = `<h3 class="text-xl font-bold text-gray-800">${index + 1}. ${question}</h3>`;
                        questionContainer.appendChild(button);
                    });
                } else {
                    categoryHeading.textContent = 'Category not found';
                }
            }

            function sendQuestion(questionNumber) {
                const chatBox = document.getElementById('chat-box');
                const question = document.createElement('div');
                question.className = 'my-2 p-2 bg-blue-100 rounded-lg';
                question.textContent = 'Question ' + questionNumber + ': ' + getQuestion(questionNumber);
                chatBox.appendChild(question);

                const answer = document.createElement('div');
                answer.className = 'my-2 p-2 bg-green-100 rounded-lg';
                answer.innerHTML = getAnswer(questionNumber); 
                chatBox.appendChild(answer);

                chatBox.scrollTop = chatBox.scrollHeight;

                // Save to history if logged in
                if (<?php echo isset($_SESSION['valid']) ? 'true' : 'false'; ?>) {
                    saveToHistory('Question ' + questionNumber + ': ' + getQuestion(questionNumber));
                }
            }

            function getQuestion(questionNumber) {
                const selectedCategory = getSelectedCategory();
                return categories[selectedCategory].questions[questionNumber - 1] || 'No question available.';
            }

            function getAnswer(questionNumber) {
                const selectedCategory = getSelectedCategory();
                return categories[selectedCategory].answers[questionNumber - 1] || ' No answer available.';
            }

            function saveToHistory(question) {
                if (!sessionStorage.getItem('searchHistory')) {
                    sessionStorage.setItem('searchHistory', JSON.stringify([]));
                }
                const history = JSON.parse(sessionStorage.getItem('searchHistory'));
                history.push(question);
                sessionStorage.setItem('searchHistory', JSON.stringify(history));
            }

            document.getElementById('send-button').addEventListener('click', function() {
                const input = document.getElementById('chat-input');
                const questionNumber = parseInt(input.value.trim());
                const selectedCategory = getSelectedCategory();
                if (!isNaN(questionNumber) && questionNumber > 0 && questionNumber <= categories[selectedCategory].questions.length) {
                    sendQuestion(questionNumber);
                    input.value = '';
                } else {
                    alert('Please enter a valid question number between 1 and ' + categories[selectedCategory].questions.length + '.');
                }
            });

            // Function to toggle the dropdown menu
            function toggleDropdown() {
                const dropdownMenu = document.getElementById('dropdown-menu');
                dropdownMenu.classList.toggle('show');
            }

            // Call the function to display questions on page load
            displayQuestions();
        </script>
    </body>
</html>