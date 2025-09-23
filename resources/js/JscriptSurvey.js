
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