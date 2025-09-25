<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Course Recommendation Survey</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('partials.favicon')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }
        .checkbox-item {
            transition: all 0.2s ease;
        }
        .checkbox-item:hover {
            background-color: #f8fafc;
            transform: translateX(4px);
        }
        .progress-bar {
            background: linear-gradient(90deg, #667eea, #764ba2);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg mb-4">
                <i class="fas fa-graduation-cap text-3xl text-indigo-600"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">DICT Course Recommendation</h1>
            <p class="text-indigo-100 text-lg">Help us find the perfect training programs for your career growth</p>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white bg-opacity-20 rounded-full h-2 mb-8">
            <div class="progress-bar h-full rounded-full" style="width: 0%" id="progressBar"></div>
        </div>

        <!-- Survey Form -->
   <form action="{{ route('survey.store') }}" method="POST" class="bg-white rounded-3xl card-shadow p-8 space-y-8">
    @csrf

            <!-- Course Preferences Section -->
            <div class="section" data-section="1">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-book text-sm"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Course Preferences</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-star mr-2 text-indigo-600"></i>What type of courses are you most interested in? *
                        </label>
                        <div class="grid md:grid-cols-2 gap-3">
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="web_development" value="web_development" class="mr-3 text-indigo-600">
                                <i class="fas fa-code mr-2 text-indigo-600"></i>
                                Web Development
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="mobile_development" value="mobile_development" class="mr-3 text-indigo-600">
                                <i class="fas fa-mobile-alt mr-2 text-indigo-600"></i>
                                Mobile Development
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="data_science" value="data_science" class="mr-3 text-indigo-600">
                                <i class="fas fa-chart-bar mr-2 text-indigo-600"></i>
                                Data Science & Analytics
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="cybersecurity" value="cybersecurity" class="mr-3 text-indigo-600">
                                <i class="fas fa-shield-alt mr-2 text-indigo-600"></i>
                                Cybersecurity
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="ai_machine_learning" value="ai_machine_learning" class="mr-3 text-indigo-600">
                                <i class="fas fa-robot mr-2 text-indigo-600"></i>
                                AI & Machine Learning
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="digital_marketing" value="digital_marketing" class="mr-3 text-indigo-600">
                                <i class="fas fa-bullhorn mr-2 text-indigo-600"></i>
                                Digital Marketing
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="cloud_computing" value="cloud_computing" class="mr-3 text-indigo-600">
                                <i class="fas fa-cloud mr-2 text-indigo-600"></i>
                                Cloud Computing
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="ui_ux_design" value="ui_ux_design" class="mr-3 text-indigo-600">
                                <i class="fas fa-palette mr-2 text-indigo-600"></i>
                                UI/UX Design
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-target mr-2 text-indigo-600"></i>What's your primary goal? *
                        </label>
                        <select name="primary_goal" class="form-input w-full rounded-xl p-3 focus:outline-none" required>
                            <option value="">Select your primary goal</option>
                            <option value="career_change">Career Change</option>
                            <option value="skill_upgrade">Skill Upgrade</option>
                            <option value="certification">Professional Certification</option>
                            <option value="personal_interest">Personal Interest</option>
                            <option value="startup_preparation">Startup Preparation</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-money-bill-wave mr-2 text-indigo-600"></i>Course Type Preference
                        </label>
                        <div class="flex flex-wrap gap-3">
                            <label class="flex items-center p-3 border rounded-xl cursor-pointer checkbox-item">
                                <input type="radio" name="course_type" value="free" class="mr-3 text-indigo-600">
                                <i class="fas fa-gift mr-2 text-green-600"></i>
                                Free Courses Only
                            </label>
                            <label class="flex items-center p-3 border rounded-xl cursor-pointer checkbox-item">
                                <input type="radio" name="course_type" value="paid" class="mr-3 text-indigo-600">
                                <i class="fas fa-credit-card mr-2 text-blue-600"></i>
                                Paid Courses
                            </label>
                            <label class="flex items-center p-3 border rounded-xl cursor-pointer checkbox-item">
                                <input type="radio" name="course_type" value="both" class="mr-3 text-indigo-600">
                                <i class="fas fa-balance-scale mr-2 text-indigo-600"></i>
                                Both Free & Paid
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learning Preferences Section -->
            <div class="section hidden" data-section="2">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-clock text-sm"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Learning Preferences</h2>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-calendar mr-2 text-indigo-600"></i>How often do you attend training/courses?
                            </label>
                            <select name="frequency" class="form-input w-full rounded-xl p-3 focus:outline-none">
                                <option value="">Select frequency</option>
                                <option value="weekly">Weekly</option>
                                <option value="bi_weekly">Bi-weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="occasionally">Occasionally</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-sun mr-2 text-indigo-600"></i>Preferred time of day
                            </label>
                            <select name="preferred_time" class="form-input w-full rounded-xl p-3 focus:outline-none">
                                <option value="">Select preferred time</option>
                                <option value="early_morning">Early Morning (6-9 AM)</option>
                                <option value="morning">Morning (9 AM-12 PM)</option>
                                <option value="afternoon">Afternoon (12-5 PM)</option>
                                <option value="evening">Evening (5-8 PM)</option>
                                <option value="night">Night (8-11 PM)</option>
                                <option value="flexible">Flexible</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-laptop mr-2 text-indigo-600"></i>Preferred learning format
                        </label>
                        <div class="grid md:grid-cols-3 gap-3">
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="online_live" class="mr-3 text-indigo-600">
                                <i class="fas fa-video mr-2 text-red-600"></i>
                                Online Live
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="online_recorded" class="mr-3 text-indigo-600">
                                <i class="fas fa-play-circle mr-2 text-blue-600"></i>
                                Online Recorded
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="face_to_face" class="mr-3 text-indigo-600">
                                <i class="fas fa-users mr-2 text-green-600"></i>
                                Face-to-face
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="hybrid" class="mr-3 text-indigo-600">
                                <i class="fas fa-sync-alt mr-2 text-purple-600"></i>
                                Hybrid
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="workshop" class="mr-3 text-indigo-600">
                                <i class="fas fa-tools mr-2 text-orange-600"></i>
                                Workshop
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="learning_format[]" value="bootcamp" class="mr-3 text-indigo-600">
                                <i class="fas fa-fire mr-2 text-red-600"></i>
                                Bootcamp
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-hourglass-half mr-2 text-indigo-600"></i>Preferred course duration
                        </label>
                        <select name="course_duration" class="form-input w-full rounded-xl p-3 focus:outline-none">
                            <option value="">Select duration</option>
                            <option value="1_week">1 Week or less</option>
                            <option value="2_4_weeks">2-4 Weeks</option>
                            <option value="1_3_months">1-3 Months</option>
                            <option value="3_6_months">3-6 Months</option>
                            <option value="6_months_plus">6+ Months</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Personal Interests Section -->
            <div class="section hidden" data-section="3">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-heart text-sm"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Personal Interests & Additional Information</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">
                            <i class="fas fa-gamepad mr-2 text-indigo-600"></i>What are your hobbies/interests?
                        </label>
                        <div class="grid md:grid-cols-3 gap-3">
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="gaming" class="mr-3 text-indigo-600">
                                <i class="fas fa-gamepad mr-2"></i>Gaming
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="photography" class="mr-3 text-indigo-600">
                                <i class="fas fa-camera mr-2"></i>Photography
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="reading" class="mr-3 text-indigo-600">
                                <i class="fas fa-book mr-2"></i>Reading
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="music" class="mr-3 text-indigo-600">
                                <i class="fas fa-music mr-2"></i>Music
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="sports" class="mr-3 text-indigo-600">
                                <i class="fas fa-futbol mr-2"></i>Sports
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="traveling" class="mr-3 text-indigo-600">
                                <i class="fas fa-plane mr-2"></i>Traveling
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="cooking" class="mr-3 text-indigo-600">
                                <i class="fas fa-utensils mr-2"></i>Cooking
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="art_design" class="mr-3 text-indigo-600">
                                <i class="fas fa-paint-brush mr-2"></i>Art & Design
                            </label>
                            <label class="checkbox-item flex items-center p-3 border rounded-xl cursor-pointer">
                                <input type="checkbox" name="hobbies[]" value="writing" class="mr-3 text-indigo-600">
                                <i class="fas fa-pen mr-2"></i>Writing
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-comment-dots mr-2 text-indigo-600"></i>Additional comments or specific course requests
                        </label>
                        <textarea name="additional_comments" rows="4" 
                                  class="form-input w-full rounded-xl p-3 focus:outline-none resize-none" 
                                  placeholder="Tell us more about what you're looking for, any specific skills you want to learn, or questions you have about DICT programs..."></textarea>
                    </div>

                    <div>
                        <label class="checkbox-item flex items-center p-4 border rounded-xl cursor-pointer bg-blue-50">
                            <input type="checkbox" name="newsletter" value="yes" class="mr-3 text-indigo-600">
                            <div>
                                <i class="fas fa-envelope mr-2 text-indigo-600"></i>
                                <strong>Stay updated!</strong> Subscribe to receive notifications about new courses and training opportunities from DICT.
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center pt-6">
                <button type="button" id="prevBtn" class="px-6 py-3 bg-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-400 transition-all duration-300 hidden">
                    <i class="fas fa-arrow-left mr-2"></i>Previous
                </button>
                <div class="flex space-x-2">
                    <div class="w-3 h-3 bg-indigo-600 rounded-full step-indicator active" data-step="1"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full step-indicator" data-step="2"></div>
                    <div class="w-3 h-3 bg-gray-300 rounded-full step-indicator" data-step="3"></div>
                </div>
                <button type="button" id="nextBtn" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all duration-300 shadow-lg">
                    Next <i class="fas fa-arrow-right ml-2"></i>
                </button>
                <button type="submit" id="submitBtn" class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hidden">
                    <i class="fas fa-paper-plane mr-2"></i>Submit Survey
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8 text-white">
            <p class="text-sm opacity-75">Powered by DICT - Department of Information and Communications Technology</p>
        </div>
    </div>
    {{-- @vite(['resources/css/app.css', 'resources/js/JscriptSurvey.js']) --}}

    <script>
        
        let currentSection = 1;
        const totalSections = 3;

        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');
        const sections = document.querySelectorAll('.section');
        const stepIndicators = document.querySelectorAll('.step-indicator');

        function showSection(n) {
            sections.forEach(section => section.classList.add('hidden'));
            sections[n - 1].classList.remove('hidden');

            stepIndicators.forEach(indicator => indicator.classList.remove('active'));
            stepIndicators[n - 1].classList.add('active');

            if (n === 1) {
                prevBtn.classList.add('hidden');
            } else {
                prevBtn.classList.remove('hidden');
            }

            if (n === totalSections) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }

            // Update progress bar
            const progress = (n / totalSections) * 100;
            progressBar.style.width = progress + '%';
        }

        nextBtn.addEventListener('click', () => {
            if (currentSection < totalSections) {
                currentSection++;
                showSection(currentSection);
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentSection > 1) {
                currentSection--;
                showSection(currentSection);
            }
        });

        // Form submission handler
        document.getElementById('surveyForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show success message
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData);
            
            alert('Thank you for completing the DICT Course Recommendation Survey! Our system will analyze your preferences and send you personalized course recommendations via email.');
            
            // Here you would normally send the data to your Laravel backend
            console.log('Survey data:', data);
        });

        // Initialize
        showSection(1);
        </script>
</body>
</html>