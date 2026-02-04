<div class="modal-overlay" id="votingModal">
    <div class="modal-container">
        <button class="modal-close" id="closeModal">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" />
            </svg>
        </button>

        <div class="modal-icon">
            <img src="{{ asset('assets/imgs/check.png') }}" alt="Success">
        </div>

        <h3 class="modal-title">تأكيد تصويتك</h3>
        <p class="modal-description">لا يمكنك التراجع عن هذا الإجراء</p>

        <div class="modal-contestant-info">
            <div class="modal-contestant-image">
                <img src="" alt="Contestant" id="modalContestantImage">
            </div>
            <div class="modal-contestant-details">
                <h4 class="modal-contestant-name" id="modalContestantName"></h4>
                <div class="modal-contestant-meta">
                    <span id="modalContestantAge"></span> سنة • <span id="modalContestantCity"></span>
                </div>
            </div>
        </div>

        <form id="voteForm">
            @csrf
            <input type="hidden" name="contestant_id" id="contestantId">

            <div class="modal-form">
                <div class="form-group">
                    <label class="form-label">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                stroke="#D68E26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                stroke="#D68E26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        الإسم الثلاثي
                    </label>
                    <input type="text" class="form-input" name="voter_name" placeholder="أدخل الاسم الثلاثي"
                        id="voterName">
                    <span class="form-error" id="nameError">الإسم الثلاثي مطلوب</span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                stroke="#D68E26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="#D68E26" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        البريد الإلكتروني
                    </label>
                    <input type="email" class="form-input" name="voter_email" placeholder="أدخل بريدك الإلكتروني"
                        id="voterEmail">
                    <span class="form-error" id="emailError">قم بإدخال البريد الإلكتروني بشكل صحيح</span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 16.92V19.92C22 20.4696 21.7893 20.9969 21.4142 21.3871C21.0391 21.7772 20.5304 21.9999 20 21.9999C16.7428 21.7599 13.5974 20.7471 10.8 19.0399C8.1832 17.4818 5.9344 15.3326 4.42 12.8199C2.68 10.0858 1.6 6.98494 1.2 3.82994C1.13 3.29994 1.24 2.75994 1.51 2.28994C1.78 1.81994 2.2 1.43994 2.7 1.20994C3.2 0.979941 3.76 0.919941 4.3 1.03994C4.84 1.15994 5.33 1.45994 5.7 1.89994L8.4 5.39994C8.88 5.93994 9.1 6.64994 9 7.35994C8.9 8.06994 8.5 8.70994 7.9 9.12994L6.6 10.1299C8.1 12.6599 10.4 14.9499 13 16.3999L14 15.0999C14.42 14.4999 15.06 14.0999 15.77 13.9999C16.48 13.8999 17.19 14.1099 17.73 14.5899L21.23 17.2899C21.67 17.6599 21.97 18.1499 22.09 18.6899C22.21 19.2299 22.15 19.7899 21.92 20.2899C21.69 20.7899 21.31 21.2099 20.84 21.4799C20.37 21.7499 19.83 21.8599 19.3 21.7899L22 16.92Z"
                                stroke="#D68E26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        رقم الواتس المحمول
                    </label>
                    <input type="tel" class="form-input" name="voter_phone" placeholder="أدخل رقم الهاتف المحمول"
                        id="voterPhone">
                    <span class="form-error" id="phoneError">رقم الواتس المحمول مطلوب</span>
                </div>
            </div>

            <div class="modal-notice">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        stroke="#D68E26" stroke-width="2" />
                    <path d="M12 16V12" stroke="#D68E26" stroke-width="2" stroke-linecap="round" />
                    <circle cx="12" cy="8" r="1" fill="#D68E26" />
                </svg>
                <p>تذكر: يمكنك منح التصويت مرة واحدة، فلن يمكنك التراجع أو إعادة تصويتك بعد هذا الإجراء. وذلك من خلال
                    هذا البريد الإلكتروني</p>
            </div>

            <div class="modal-actions">
                <button type="submit" class="modal-button modal-button-primary" id="confirmVote">
                    تأكيد التصويت
                </button>
                <button type="button" class="modal-button modal-button-secondary" id="cancelVote">
                    إلغاء
                </button>
            </div>
        </form>
    </div>
</div>
