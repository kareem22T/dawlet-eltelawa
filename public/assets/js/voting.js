// Voting System JavaScript

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('votingModal');
    const thanksModal = document.getElementById('thanksModal');
    const closeModalBtn = document.getElementById('closeModal');
    const cancelVoteBtn = document.getElementById('cancelVote');
    const voteForm = document.getElementById('voteForm');
    const voteButtons = document.querySelectorAll('.vote-button');

    // Modal contestant info elements
    const modalContestantName = document.getElementById('modalContestantName');
    const modalContestantAge = document.getElementById('modalContestantAge');
    const modalContestantCity = document.getElementById('modalContestantCity');
    const modalContestantImage = document.getElementById('modalContestantImage');
    const contestantIdInput = document.getElementById('contestantId');

    // Form inputs
    const voterName = document.getElementById('voterName');
    const voterEmail = document.getElementById('voterEmail');
    const voterPhone = document.getElementById('voterPhone');

    // Open modal when vote button is clicked
    voteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            if (this.disabled) {
                alert('لقد قمت بالتصويت من قبل');
                return;
            }

            // Get contestant data from button attributes
            const contestantName = this.getAttribute('data-contestant');
            const contestantId = this.getAttribute('data-contestant-id');
            const contestantAge = this.getAttribute('data-age');
            const contestantCity = this.getAttribute('data-city');
            const contestantImageSrc = this.getAttribute('data-image');

            // Update modal with contestant info
            modalContestantName.textContent = contestantName;
            modalContestantAge.textContent = contestantAge;
            modalContestantCity.textContent = contestantCity;
            modalContestantImage.src = contestantImageSrc;
            modalContestantImage.alt = contestantName;
            contestantIdInput.value = contestantId;

            // Reset form
            voterName.value = '';
            voterEmail.value = '';
            voterPhone.value = '';
            clearErrors();

            // Show modal
            openModal();
        });
    });

    // Close modal function
    function closeModal() {
        modal.classList.remove('active');
        document.body.classList.remove('overflow-hidden');
    }

    // Open modal function
    function openModal() {
        modal.classList.add('active');
        document.body.classList.add('overflow-hidden');
    }

    // Close modal when clicking close button
    closeModalBtn.addEventListener('click', closeModal);

    // Close modal when clicking cancel button
    cancelVoteBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    // Handle vote form submission
    voteForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        // Clear previous errors
        clearErrors();

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Prepare form data
        const formData = new FormData(voteForm);

        // Show loading state
        const submitBtn = document.getElementById('confirmVote');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span>جاري التصويت...</span>';
        submitBtn.disabled = true;

        try {
            const response = await fetch('/vote', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Close voting modal
                closeModal();

                // Show thanks modal
                setTimeout(() => {
                    showThanksModal(data.contestant_name);
                }, 300);

                // Disable all vote buttons
                voteButtons.forEach(btn => {
                    btn.disabled = true;
                    btn.style.opacity = '0.5';
                    btn.style.cursor = 'not-allowed';
                    btn.innerHTML = btn.innerHTML.replace('صوت الآن', 'تم التصويت');
                });

            } else {
                // Show error message
                if (data.errors) {
                    // Show validation errors
                    Object.keys(data.errors).forEach(key => {
                        const errorElement = document.getElementById(key.replace('voter_', '') + 'Error');
                        const inputElement = document.getElementById('voter' + key.replace('voter_', '').charAt(0).toUpperCase() + key.replace('voter_', '').slice(1));
                        
                        if (errorElement && inputElement) {
                            errorElement.textContent = data.errors[key][0];
                            errorElement.classList.add('show');
                            inputElement.classList.add('error');
                        }
                    });
                } else {
                    alert(data.message || 'حدث خطأ أثناء التصويت');
                }
            }

        } catch (error) {
            console.error('Error:', error);
            alert('حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى');
        } finally {
            // Restore button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });

    // Clear error on input
    [voterName, voterEmail, voterPhone].forEach(input => {
        input.addEventListener('input', function () {
            this.classList.remove('error');
            const fieldName = this.id.replace('voter', '').toLowerCase();
            const errorElement = document.getElementById(fieldName + 'Error');
            if (errorElement) {
                errorElement.classList.remove('show');
            }
        });
    });

    // Clear all errors
    function clearErrors() {
        document.querySelectorAll('.form-error').forEach(error => error.classList.remove('show'));
        document.querySelectorAll('.form-input').forEach(input => input.classList.remove('error'));
    }

    // Show thanks modal
    function showThanksModal(contestantName) {
        const thanksBadge = document.getElementById('thanksBadge');
        thanksBadge.textContent = `لقد صوت لـ ${contestantName}!`;
        thanksModal.classList.add('active');
        document.body.classList.add('overflow-hidden');
    }

    // Close thanks modal
    function closeThanksModal() {
        thanksModal.classList.remove('active');
        document.body.classList.remove('overflow-hidden');
    }

    // Thanks modal event listeners
    const returnHomeBtn = document.getElementById('returnHome');
    if (returnHomeBtn) {
        returnHomeBtn.addEventListener('click', function () {
            closeThanksModal();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Close thanks modal when clicking outside
    if (thanksModal) {
        thanksModal.addEventListener('click', function (e) {
            if (e.target === thanksModal) {
                closeThanksModal();
            }
        });
    }

    // Close thanks modal on ESC key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && thanksModal && thanksModal.classList.contains('active')) {
            closeThanksModal();
        }
    });
});

// Share functions
function shareOnWhatsApp() {
    const text = 'لقد صوت في مسابقة المتأهلون الـ 32! صوت أنت أيضاً';
    const url = window.location.origin;
    window.open(`https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`, '_blank');
}

function shareOnFacebook() {
    const url = window.location.origin;
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
}

function shareOnTwitter() {
    const text = 'لقد صوت في مسابقة المتأهلون الـ 32! صوت أنت أيضاً';
    const url = window.location.origin;
    window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`, '_blank');
}