# File Tree: laravel-dev-portfolio

**Generated:** 4/23/2026, 9:28:33 AM
**Root Path:** `c:\laragon\www\Portfolio Website\laravel-dev-portfolio`

```
├── 📁 app
│   ├── 📁 Console
│   │   └── 🐘 Kernel.php
│   ├── 📁 Exceptions
│   │   └── 🐘 Handler.php
│   ├── 📁 Http
│   │   ├── 📁 Controllers
│   │   │   ├── 📁 Api
│   │   │   │   ├── 📁 Admin
│   │   │   │   │   ├── 🐘 AboutController.php
│   │   │   │   │   ├── 🐘 BlogPostController.php
│   │   │   │   │   ├── 🐘 CategoryController.php
│   │   │   │   │   ├── 🐘 ContactMessageController.php
│   │   │   │   │   ├── 🐘 EducationController.php
│   │   │   │   │   ├── 🐘 ExperienceController.php
│   │   │   │   │   ├── 🐘 NewsletterSubscriberController.php
│   │   │   │   │   ├── 🐘 ProjectController.php
│   │   │   │   │   ├── 🐘 ProjectImageController.php
│   │   │   │   │   ├── 🐘 SectionControlController.php
│   │   │   │   │   ├── 🐘 SeoMetaController.php
│   │   │   │   │   ├── 🐘 ServiceController.php
│   │   │   │   │   ├── 🐘 SettingController.php
│   │   │   │   │   ├── 🐘 SocialLinkController.php
│   │   │   │   │   ├── 🐘 TagController.php
│   │   │   │   │   ├── 🐘 TechnologyController.php
│   │   │   │   │   ├── 🐘 TestimonialController.php
│   │   │   │   │   └── 🐘 VisitorLogController.php
│   │   │   │   ├── 🐘 AuthController.php
│   │   │   │   └── 🐘 PublicController.php
│   │   │   ├── 🐘 Controller.php
│   │   │   ├── 🐘 EducationController.php
│   │   │   └── 🐘 ExperienceController.php
│   │   ├── 📁 Middleware
│   │   │   ├── 🐘 Authenticate.php
│   │   │   ├── 🐘 EncryptCookies.php
│   │   │   ├── 🐘 PreventRequestsDuringMaintenance.php
│   │   │   ├── 🐘 RedirectIfAuthenticated.php
│   │   │   ├── 🐘 TrimStrings.php
│   │   │   ├── 🐘 TrustHosts.php
│   │   │   ├── 🐘 TrustProxies.php
│   │   │   ├── 🐘 ValidateSignature.php
│   │   │   └── 🐘 VerifyCsrfToken.php
│   │   ├── 📁 Requests
│   │   │   ├── 🐘 AboutRequest.php
│   │   │   ├── 🐘 BlogPostRequest.php
│   │   │   ├── 🐘 CategoryRequest.php
│   │   │   ├── 🐘 ContactRequest.php
│   │   │   ├── 🐘 EducationRequest.php
│   │   │   ├── 🐘 ExperienceRequest.php
│   │   │   ├── 🐘 LoginRequest.php
│   │   │   ├── 🐘 ProjectImageRequest.php
│   │   │   ├── 🐘 ProjectRequest.php
│   │   │   ├── 🐘 SectionControlRequest.php
│   │   │   ├── 🐘 SeoMetaRequest.php
│   │   │   ├── 🐘 ServiceRequest.php
│   │   │   ├── 🐘 SettingRequest.php
│   │   │   ├── 🐘 SocialLinkRequest.php
│   │   │   ├── 🐘 StoreEducationRequest.php
│   │   │   ├── 🐘 StoreExperienceRequest.php
│   │   │   ├── 🐘 TagRequest.php
│   │   │   ├── 🐘 TechnologyRequest.php
│   │   │   ├── 🐘 TestimonialRequest.php
│   │   │   └── 🐘 VisitorLogRequest.php
│   │   └── 🐘 Kernel.php
│   ├── 📁 Models
│   │   ├── 🐘 About.php
│   │   ├── 🐘 BlogPost.php
│   │   ├── 🐘 BlogPostTag.php
│   │   ├── 🐘 Category.php
│   │   ├── 🐘 ContactMessage.php
│   │   ├── 🐘 Education.php
│   │   ├── 🐘 Experience.php
│   │   ├── 🐘 NewsletterSubscriber.php
│   │   ├── 🐘 Project.php
│   │   ├── 🐘 ProjectCategory.php
│   │   ├── 🐘 ProjectImage.php
│   │   ├── 🐘 ProjectTechnology.php
│   │   ├── 🐘 SectionControl.php
│   │   ├── 🐘 SeoMeta.php
│   │   ├── 🐘 Service.php
│   │   ├── 🐘 Setting.php
│   │   ├── 🐘 SocialLink.php
│   │   ├── 🐘 Tag.php
│   │   ├── 🐘 Technology.php
│   │   ├── 🐘 Testimonial.php
│   │   ├── 🐘 User.php
│   │   └── 🐘 VisitorLog.php
│   ├── 📁 Policies
│   │   ├── 🐘 EducationPolicy.php
│   │   └── 🐘 ExperiencePolicy.php
│   └── 📁 Providers
│       ├── 🐘 AppServiceProvider.php
│       ├── 🐘 AuthServiceProvider.php
│       ├── 🐘 BroadcastServiceProvider.php
│       ├── 🐘 EventServiceProvider.php
│       └── 🐘 RouteServiceProvider.php
├── 📁 bootstrap
│   └── 🐘 app.php
├── 📁 config
│   ├── 🐘 app.php
│   ├── 🐘 auth.php
│   ├── 🐘 broadcasting.php
│   ├── 🐘 cache.php
│   ├── 🐘 cors.php
│   ├── 🐘 database.php
│   ├── 🐘 filesystems.php
│   ├── 🐘 hashing.php
│   ├── 🐘 logging.php
│   ├── 🐘 mail.php
│   ├── 🐘 queue.php
│   ├── 🐘 sanctum.php
│   ├── 🐘 services.php
│   ├── 🐘 session.php
│   └── 🐘 view.php
├── 📁 database
│   ├── 📁 factories
│   │   ├── 🐘 EducationFactory.php
│   │   ├── 🐘 ExperienceFactory.php
│   │   └── 🐘 UserFactory.php
│   ├── 📁 migrations
│   │   ├── 🐘 2014_10_12_000000_create_users_table.php
│   │   ├── 🐘 2014_10_12_100000_create_password_reset_tokens_table.php
│   │   ├── 🐘 2019_08_19_000000_create_failed_jobs_table.php
│   │   ├── 🐘 2019_12_14_000001_create_personal_access_tokens_table.php
│   │   ├── 🐘 2026_03_15_065137_create_abouts_table.php
│   │   ├── 🐘 2026_03_15_065146_create_social_links_table.php
│   │   ├── 🐘 2026_03_15_065153_create_settings_table.php
│   │   ├── 🐘 2026_03_15_065157_create_projects_table.php
│   │   ├── 🐘 2026_03_15_065159_create_project_images_table.php
│   │   ├── 🐘 2026_03_15_065205_create_technologies_table.php
│   │   ├── 🐘 2026_03_15_065207_create_categories_table.php
│   │   ├── 🐘 2026_03_15_065207_create_project_technologies_table.php
│   │   ├── 🐘 2026_03_15_065214_create_project_categories_table.php
│   │   ├── 🐘 2026_03_15_065215_create_blog_posts_table.php
│   │   ├── 🐘 2026_03_15_065216_create_tags_table.php
│   │   ├── 🐘 2026_03_15_065217_create_blog_post_tags_table.php
│   │   ├── 🐘 2026_03_15_065224_create_seo_metas_table.php
│   │   ├── 🐘 2026_03_15_065225_create_section_controls_table.php
│   │   ├── 🐘 2026_03_15_065226_create_testimonials_table.php
│   │   ├── 🐘 2026_03_15_065227_create_contact_messages_table.php
│   │   ├── 🐘 2026_03_15_065228_create_newsletter_subscribers_table.php
│   │   ├── 🐘 2026_03_15_072356_create_education_table.php
│   │   ├── 🐘 2026_03_15_072517_create_experiences_table.php
│   │   ├── 🐘 2026_03_15_072811_create_visitor_logs_table.php
│   │   ├── 🐘 2026_03_25_000000_create_services_table.php
│   │   └── 🐘 2026_04_20_110000_add_moto_to_abouts_table.php
│   ├── 📁 seeders
│   │   ├── 🐘 DatabaseSeeder.php
│   │   ├── 🐘 EducationSeeder.php
│   │   └── 🐘 ExperienceSeeder.php
│   └── ⚙️ .gitignore
├── 📁 public
│   ├── ⚙️ .htaccess
│   ├── 📄 favicon.ico
│   ├── 🐘 index.php
│   └── 📄 robots.txt
├── 📁 resources
│   ├── 📁 css
│   │   └── 🎨 app.css
│   ├── 📁 js
│   │   ├── 📄 app.js
│   │   └── 📄 bootstrap.js
│   └── 📁 views
│       └── 🐘 welcome.blade.php
├── 📁 routes
│   ├── 🐘 api.php
│   ├── 🐘 channels.php
│   ├── 🐘 console.php
│   └── 🐘 web.php
├── 📁 storage
│   ├── 📁 app
│   │   ├── 📁 public
│   │   │   ├── 📁 about
│   │   │   │   ├── 🖼️ kwfXXTp2hqiHPAxG0DufAtDpQ3cRrhwVlcmFNIra.png
│   │   │   │   └── 📕 rINOslLrlLYw6cqUlY1qXTxYmXig3XGYsxRknP2W.pdf
│   │   │   ├── 📁 projects
│   │   │   │   ├── 📁 gallery
│   │   │   │   │   ├── 🖼️ DTnKCNMI289VHH1PdNd88NmGcL68EWqyIEXbDLN6.png
│   │   │   │   │   ├── 🖼️ HCBMQVilnAYaJK4QanO3fjpFjNOpP9DgYmEg1DXi.png
│   │   │   │   │   ├── 🖼️ LOrltau8pH72MSBHEu6thOcJgPjeNd34UP1zltCJ.png
│   │   │   │   │   └── 🖼️ Y4vwyX4ymtcsFTzUFWmjZ6qRYlEEZcFHjLRCc9EX.png
│   │   │   │   └── 🖼️ 6qx8p26BsuWFNdtuA1oaHAVjaWIk0iHsqVle86GZ.png
│   │   │   ├── 📁 services
│   │   │   │   ├── 🖼️ GguhLmgAmrFVNPd5Cz20XRFhhqI1jIovyAUUJIrc.jpg
│   │   │   │   ├── 🖼️ IVDPK1XXp3rxrve0WnzIZgYkqiEDI5ze93eG6ZLO.jpg
│   │   │   │   ├── 🖼️ caAlB8POmdZkuHC0u3xNwTdok5A4RMYVd1LR4ZXK.jpg
│   │   │   │   └── 🖼️ nTlLtCHvotTNRcs4sYntYmp85B4IRjwq8K0LgYDm.jpg
│   │   │   ├── 📁 settings
│   │   │   │   ├── 🖼️ AVsyy4YbYz1CMAO2Z2N4tUhO98lTHgZGW28tH3Wa.png
│   │   │   │   └── 🖼️ rksatalbtJIiA9ERVOdOeLD2wx9J6vwoh1w2WsiG.png
│   │   │   ├── 📁 technologies
│   │   │   │   ├── 🖼️ 41TsxI7AlSLWsP60CrA5CuofMYlKEOfgXjtOdlxi.png
│   │   │   │   ├── 🖼️ 8uuQayH1GNMVBvjgxGXsh8HLuNWwu2i8jcIsdrUx.png
│   │   │   │   ├── 🖼️ 9Dv3S7Bo0lZg6F909DM5DPHyfmVw1WnEPEyuh4e7.png
│   │   │   │   ├── 🖼️ G02cq1TA6nnDGjWV6Akxzdx3pIZ3DVHM90M60zU8.png
│   │   │   │   ├── 🖼️ GohbBlcqLnhXJzGxMGpCBdrA2CQrJb01HcDXYdkf.png
│   │   │   │   ├── 🖼️ IDQ1wN62QfJpiWxqsFI0ErImtp6HYY7fC9X4R48F.png
│   │   │   │   ├── 🖼️ Q8DcngilTWAYMdGJp25GAkEWN4EbALHCGU7VeBiT.png
│   │   │   │   ├── 🖼️ S4JSrl5CbDjhgHje9AxeV5TSwOxNHMmPZxFGsqxw.png
│   │   │   │   ├── 🖼️ ScCuDVCVcpCzGm5thdJyiCw4WAvqJmyqBvKQFUtR.png
│   │   │   │   ├── 🖼️ Z0pKhU6D9tYdeFJHzXseMNQwDCBg5IAfVZAd4zg1.png
│   │   │   │   ├── 🖼️ dx5zjU26Wm3kUtPN64Jr7NMJ4k06jrcM3qid79dH.png
│   │   │   │   ├── 🖼️ h957cJkiNiufyVUvVZ9G0ZD8DGWypMbEkxtkwY98.png
│   │   │   │   ├── 🖼️ iA5dGWO1XMaHZ35n9TNVy5s7ic59W16UEKEOnDpr.png
│   │   │   │   ├── 🖼️ r50AWqXQTOAD6hcJSxxmVzJXvvfEPX0ZHvIohAnw.png
│   │   │   │   ├── 🖼️ s79sXdc62mu4tS5BSSxe8hjZjrNI8kHtxn1JQv2j.png
│   │   │   │   ├── 🖼️ wY3lXrESEZVZfgjQ1Q6LIpkvGDw0yqLfJHNPbwQF.png
│   │   │   │   ├── 🖼️ yfNnAE7AH0HHEFzx3rWGXrKoODxmK0yfsLiEV8zi.png
│   │   │   │   └── 🖼️ ztvPTtzFzFTbEElXYFe1JSiD3A3gurh5LSWBwiWP.png
│   │   │   └── ⚙️ .gitignore
│   │   └── ⚙️ .gitignore
│   ├── 📁 framework
│   │   ├── 📁 sessions
│   │   │   ├── ⚙️ .gitignore
│   │   │   ├── 📄 agxNSFmkUp8uAQRxwNalberTFnWGLfZqLjzePW1p
│   │   │   ├── 📄 q0uzvlhtEcZaQhPtASqIlSbUMe048FsLTXtOt5Ne
│   │   │   └── 📄 qeW34GYHVFGe139fxGQHwHoiDlxM8IGGr9u5VnuJ
│   │   ├── 📁 testing
│   │   │   └── ⚙️ .gitignore
│   │   ├── 📁 views
│   │   │   ├── ⚙️ .gitignore
│   │   │   ├── 🐘 2d5a09b1f426375fd6ea92a47021958f.php
│   │   │   ├── 🐘 cfc584187b23429e00fe8c6c9372e249.php
│   │   │   └── 🐘 eab9337f09ddd63cdf5f3d94798a9a8c.php
│   │   └── ⚙️ .gitignore
│   └── 📁 logs
│       └── ⚙️ .gitignore
├── 📁 tests
│   ├── 📁 Feature
│   │   └── 🐘 ExampleTest.php
│   ├── 📁 Unit
│   │   └── 🐘 ExampleTest.php
│   ├── 🐘 CreatesApplication.php
│   └── 🐘 TestCase.php
├── ⚙️ .editorconfig
├── ⚙️ .env.example
├── ⚙️ .gitattributes
├── ⚙️ .gitignore
├── 📝 README.md
├── 📄 artisan
├── ⚙️ composer.json
├── ⚙️ package.json
├── ⚙️ phpunit.xml
├── 📝 task.md
└── 📄 vite.config.js
```

---
*Generated by FileTree Pro Extension*