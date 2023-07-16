<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="footer-links">
                        <h5 class="lead footer-hdr">求職者の方へ</h5>
                        <div class="line-divider"></div>
                        <div class="footer-link-list">
                            <a href="{{ route('register') }}" class="footer-links">新規会員登録  <span
                                    class="badge badge-primary">無料</span></a>
                            <a href="{{ route('login') }}" class="footer-links">ログイン</a>
                            <a href="" class="footer-links">エリアからキャバクラボーイ求人情報を探す</a>
                            <a href="#" class="footer-links">よくある質問</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footer-links">
                        <h5 class="lead footer-hdr">求人企業の方へ</h5>
                        <div class="line-divider"></div>
                        <div class="footer-link-list">
                            <a href="{{ route('register') }}" class="footer-links">企業登録 <span
                                    class="badge badge-primary">無料</span></a>
                            <a href="{{ route('login') }}" class="footer-links">ログイン</a>
                            <a href="{{ route('post.create') }}" class="footer-links">採用情報</a>
                            <a href="#" class="footer-links">よくある質問</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footer-links">
                        <h5 class="lead footer-hdr">リンク</h5>
                        <div class="line-divider"></div>
                        <div class="footer-link-list">
                            <a href="#" class="footer-links">トップページ</a>
                            <a href="#" class="footer-links">会社概要</a>
                            <a href="#" class="footer-links">広告掲載</a>
                            <a href="#" class="footer-links">お問い合わせ</a>
                            <a href="#" class="footer-links">よくある質問</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="footer-links">
                        <h3 class="footer-brand mb-2">株式会社ナイトジョブ</h3>
                        <div class="footer-link-list">
                            <a href="#" class="footer-links"><i class="fas fa-compass"></i>
                            長崎県長崎市女の都4丁目36-5</a>
                            <a href="tel:09010854461" class="footer-links"><i class="fas fa-phone"></i>
                            090-1085-4461</a>
                            <a href="mailto:namima604@gmail.com" class="footer-links"><i class="fas fa-envelope"></i>
                            namima604@gmail.com</a>
                            <div class="social-links">
                                <a href="https://www.facebook.com" target="_blank" class="social-link"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="https://www.twitter.com" target="_blank" class="social-link"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com" target="_blank" class="social-link"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('css')
    <style>
        .footer-main {
            background-color: #8d0d62;
            color: #ddd;
        }

        .footer-links {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .footer-links .footer-hdr {
            color: #ddd;
        }

        .footer-links .footer-link-list .footer-links {
            display: block;
            color: #ccc;
            padding: 3px 0;
            margin: 0;
            font-size: 1.5rem;
        }

        .footer-links .footer-link-list .footer-links:hover {
            color: white;
        }

        .footer-main .social-links {
            margin: 20px 0;
        }

        .footer-main .social-links .social-link {
            background-color: white;
            color: #333;
            padding: 8px 10px;
            border-radius: 50%;
            transition: all .3s ease;
        }

        .footer-main .social-links .social-link:hover {
            color: white;
            background-color: #0261A6;
        }
    </style>
@endpush
