<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #2c3e50; text-align: center; }
        .section { margin-bottom: 20px; }
        .toc { margin-bottom: 30px; }
        .footer { font-size: 0.8em; text-align: right; color: #666; }
    </style>
</head>
<body>
<div class="manual-container">

    <div class="toc card">
        <h2 class="toc-title">{{ __('messages.table_of_contents') }}</h2>
        <ol class="toc-list">
            <li><a href="#uvod">{{ __('messages.introduction') }}</a></li>
            <li><a href="#registracia">{{ __('messages.registration_login') }}</a></li>
            <li><a href="#zakladne-operacie">{{ __('messages.basic_operations') }}</a>
                <ol>
                    <li><a href="#merge">{{ __('messages.merge_pdf') }}</a></li>
                    <li><a href="#split">{{ __('messages.split_pdf') }}</a></li>
                    <li><a href="#unlock">{{ __('messages.unlock_pdf') }}</a></li>
                    <li><a href="#rotate">{{ __('messages.rotate_page') }}</a></li>
                    <li><a href="#remove">{{ __('messages.remove_page') }}</a></li>
                </ol>
            </li>
            <li><a href="#pokrocile-funkcie">{{ __('messages.advanced_features') }}</a>
                <ol>
                    <li><a href="#extract">{{ __('messages.extract_page') }}</a></li>
                    <li><a href="#pagenumber">{{ __('messages.add_page_numbers') }}</a></li>
                    <li><a href="#create">{{ __('messages.create_pdf') }}</a></li>
                    <li><a href="#pdf2word">{{ __('messages.pdf_to_word') }}</a></li>
                    <li><a href="#jpg2pdf">{{ __('messages.jpg_to_pdf') }}</a></li>
                </ol>
            </li>
            <li><a href="#admin">{{ __('messages.admin_mode') }}</a></li>
            <li><a href="#faq">{{ __('messages.faq') }}</a></li>
        </ol>
    </div>

    <div class="manual-content">
        <section id="uvod" class="manual-section">
            <h2>1. {{ __('messages.introduction') }}</h2>
            <p>{{ __('messages.welcome_message') }} <strong>{{ __('messages.pdf_editor') }}</strong> - {{ __('messages.app_description') }}</p>

        </section>

        <section id="registracia" class="manual-section">
            <h2>2. {{ __('messages.registration_login') }}</h2>
            <h3>2.1 {{ __('messages.registration') }}</h3>
            <ol>
                <li>{{ __('messages.reg_step1') }}</li>
                <li>{{ __('messages.reg_step2') }}</li>
                <li>{{ __('messages.reg_step3') }}</li>
            </ol>

            <h3>2.2 {{ __('messages.login') }}</h3>
            <ol>
                <li>{{ __('messages.login_step1') }}</li>
                <li>{{ __('messages.login_step2') }}</li>
            </ol>
        </section>

        <section id="zakladne-operacie" class="section">
            <h2>3. {{ __('messages.basic_operations') }}</h2>

            <article id="merge" class="operation-guide">
                <h3>3.1 {{ __('messages.merge_pdf') }}</h3>
                <ol>
                    <li>{{ __('messages.merge_step1') }}</li>
                    <li>{{ __('messages.merge_step2') }}</li>
                    <li>{{ __('messages.merge_step3') }}</li>
                    <li>{{ __('messages.merge_step4') }}</li>
                    <li>{{ __('messages.merge_step5') }}</li>
                </ol>
            </article>

            <article id="split" class="operation-guide">
                <h3>3.2 {{ __('messages.split_pdf') }}</h3>
                <ol>
                    <li>{{ __('messages.split_step1') }}</li>
                    <li>{{ __('messages.split_step2') }}</li>
                    <li>{{ __('messages.split_step3') }}:
                        <ul>
                            <li><strong>{{ __('messages.split_option1') }}</strong> - {{ __('messages.split_option1_desc') }}</li>
                            <li><strong>{{ __('messages.split_option2') }}</strong> - {{ __('messages.split_option2_desc') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('messages.split_step4') }}</li>
                </ol>
            </article>

            <article id="unlock" class="operation-guide">
                <h3>3.3 {{ __('messages.unlock_pdf') }}</h3>
                <ol>
                    <li>{{ __('messages.unlock_step1') }}</li>
                    <li>{{ __('messages.unlock_step2') }}</li>
                    <li>{{ __('messages.unlock_step3') }}</li>
                    <li>{{ __('messages.unlock_step4') }}</li>
                </ol>
                <div class="note">
                    <strong>{{ __('messages.note') }}:</strong> {{ __('messages.unlock_note') }}
                </div>
            </article>

            <article id="rotate" class="operation-guide">
                <h3>3.4 {{ __('messages.rotate_page') }}</h3>
                <ol>
                    <li>{{ __('messages.rotate_step1') }}</li>
                    <li>{{ __('messages.rotate_step2') }}</li>
                    <li>{{ __('messages.rotate_step3') }}</li>
                    <li>{{ __('messages.rotate_step4') }}</li>
                    <li>{{ __('messages.rotate_step5') }}</li>
                </ol>
            </article>

            <article id="remove" class="operation-guide">
                <h3>3.5 {{ __('messages.remove_page') }}</h3>
                <ol>
                    <li>{{ __('messages.remove_step1') }}</li>
                    <li>{{ __('messages.remove_step2') }}</li>
                    <li>{{ __('messages.remove_step3') }}</li>
                    <li>{{ __('messages.remove_step4') }}</li>
                </ol>
            </article>
        </section>

        <section id="pokrocile-funkcie" class="section">
            <h2>4. {{ __('messages.advanced_features') }}</h2>

            <article id="extract" class="operation-guide">
                <h3>4.1 {{ __('messages.extract_page') }}</h3>
                <ol>
                    <li>{{ __('messages.extract_step1') }}</li>
                    <li>{{ __('messages.extract_step2') }}</li>
                    <li>{{ __('messages.extract_step3') }}</li>
                    <li>{{ __('messages.extract_step4') }}</li>
                </ol>
            </article>

            <article id="pagenumber" class="operation-guide">
                <h3>4.2 {{ __('messages.add_page_numbers') }}</h3>
                <ol>
                    <li>{{ __('messages.pagenumber_step1') }}</li>
                    <li>{{ __('messages.pagenumber_step2') }}</li>
                    <li>{{ __('messages.pagenumber_step3') }}</li>
                    <li>{{ __('messages.pagenumber_step4') }}</li>
                    <li>{{ __('messages.pagenumber_step5') }}</li>
                </ol>
            </article>

            <article id="create" class="operation-guide">
                <h3>4.3 {{ __('messages.create_pdf') }}</h3>
                <ol>
                    <li>{{ __('messages.create_step1') }}</li>
                    <li>{{ __('messages.create_step2') }}</li>
                    <li>{{ __('messages.create_step3') }}</li>
                    <li>{{ __('messages.create_step4') }}</li>
                </ol>
            </article>

            <article id="pdf2word" class="operation-guide">
                <h3>4.4 {{ __('messages.pdf_to_word') }}</h3>
                <ol>
                    <li>{{ __('messages.pdf2word_step1') }}</li>
                    <li>{{ __('messages.pdf2word_step2') }}</li>
                    <li>{{ __('messages.pdf2word_step3') }}</li>
                    <li>{{ __('messages.pdf2word_step4') }}</li>
                </ol>
                <div class="note">
                    <strong>{{ __('messages.note') }}:</strong> {{ __('messages.pdf2word_note') }}
                </div>
            </article>

            <article id="jpg2pdf" class="operation-guide">
                <h3>4.5 {{ __('messages.jpg_to_pdf') }}</h3>
                <ol>
                    <li>{{ __('messages.jpg2pdf_step1') }}</li>
                    <li>{{ __('messages.jpg2pdf_step2') }}</li>
                    <li>{{ __('messages.jpg2pdf_step3') }}</li>
                    <li>{{ __('messages.jpg2pdf_step4') }}</li>
                    <li>{{ __('messages.jpg2pdf_step5') }}</li>
                </ol>
            </article>
        </section>

        <section id="admin" class="section">
            <h2>5. {{ __('messages.admin_mode') }}</h2>
            <p>{{ __('messages.admin_access') }}</p>
            <ul>
                <li>{{ __('messages.admin_feature1') }}</li>
                <li>{{ __('messages.admin_feature2') }}</li>
                <li>{{ __('messages.admin_feature3') }}</li>
            </ul>
        </section>

        <div class="footer">
            <p>{{ __('messages.last_update') }}: {{ now()->format('d.m.Y') }}</p>
            <p>© 2023 {{ __('messages.app_name') }}. {{ __('messages.all_rights_reserved') }}</p>
        </div>
    </div>
</div>
</body>
</html>
