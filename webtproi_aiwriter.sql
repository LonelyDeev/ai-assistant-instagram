-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2024 at 12:31 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtproi_aiwriter`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikeys`
--

CREATE TABLE `apikeys` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apikeys`
--

INSERT INTO `apikeys` (`id`, `key`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'jq64hN7vv77QB4rpbsYg18nnOXqvCELU8xNaIBCH', 'public', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `end` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `title`, `image`, `description`, `end`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '[Main Image: The main image in the article showcases a group of deep-sea divers exploring a vibrant coral reef, surrounded by a myriad of colorful fish and marine life.] Introduction <p>Introduction:</p>\n<p>As the world becomes more connected through technology, the field of healthcare has also undergone a digital transformation. Telemedicine, the practice of delivering medical care remotely via telecommunication technology, has gained significant popularity in recent years. The convenience and accessibility of telemedicine have enabled patients to receive medical consultations and treatment from the comfort of their own homes. In this article, we will explore the benefits and drawbacks of telemedicine and discuss its potential impact on the future of healthcare.</p> What is [Keyword]? Definition of [Keyword] <blockquote><p><strong>What is [Keyword]?</strong></p></blockquote>\n\n<p>[Keyword] refers to the term or concept that will be discussed in this article. It is a fundamental aspect of [topic] and plays a significant role in understanding and exploring the various aspects of [topic]. By defining [keyword], we can delve deeper into its significance and explore its applications within the context of [topic].</p>\n\n<blockquote><p><strong>Definition of [Keyword]</strong></p></blockquote>\n\n<p>The definition of [keyword] can vary depending on the specific field or context in which it is used. However, in relation to [topic], [keyword] can be defined as [insert definition]. This definition encapsulates the essence of [keyword] within the scope of [topic], allowing us to explore its various dimensions and implications.</p>\n\n<p>Understanding the definition of [keyword] is essential as it enables us to grasp the foundation upon which [topic] is built. By comprehending the core meaning of [keyword], we can navigate through the intricacies of [topic] and gain a holistic understanding of its intricacies.</p>\n\n<p>Moreover, by examining the definition of [keyword], we can identify the key components and characteristics that set it apart from related concepts. This clarity helps to distinguish [keyword] from other terms and facilitates a more accurate and precise discussion of [topic].</p>\n\n<p>Ultimately, the definition of [keyword] serves as the starting point for any exploration or analysis of [topic]. It provides the anchor from which our understanding of [topic] can grow, leading us to delve deeper into its complexities and uncover the insights it holds.</p>\n\n<p>In the following sections, we will build upon this definition and explore the various aspects, applications, and implications of [keyword] within the broader context of [topic]. By doing so, we aim to provide a comprehensive overview that will enhance the readers\' knowledge and shed light on the significance of [keyword] within [topic].</p> Importance of [Keyword] <h2>What is [Keyword]?</h2>\n\n<p>[Keyword] is a term that encompasses the core concept and central theme of [topic]. It plays a crucial role in understanding the various aspects and implications of [topic]. [Keyword] can be defined as [insert definition]. This definition helps to establish a clear understanding of [keyword] and its significance within the broader context of [topic]. </p>\n\n<h2>Importance of [Keyword] for [Topic]</h2>\n\n<p>The importance of [keyword] in relation to [topic] cannot be overstated. By focusing on [keyword], we can gain insights into the fundamental principles and key components that exist within [topic]. Understanding [keyword] enables us to identify its applications and connections within [topic], allowing for a more in-depth exploration and analysis of [topic]. </p>\n\n<p>Additionally, [keyword] helps to distinguish [topic] from other related concepts or areas of study. By highlighting the unique characteristics and defining features of [keyword], we can create a more precise and targeted discussion of [topic]. This clarity not only enhances the reader\'s understanding but also facilitates further research and exploration of [topic]. </p>\n\n<p>Furthermore, [keyword] serves as a starting point for any comprehensive analysis or exploration of [topic]. By establishing a solid understanding of [keyword], we lay the foundation for a deeper examination of [topic]\'s complexities and implications. It allows us to delve into the nuances of [topic], uncovering valuable insights and broadening our perspective. </p>\n\n<p>In conclusion, [keyword] is a vital concept within [topic]. By delving into its definition and understanding its significance, we can unlock the hidden intricacies and explore the broader implications of [topic]. This knowledge enhances our understanding, provides valuable insights, and enables us to engage in thoughtful and informed discussions about [topic].</p> Benefits of [Keyword] Benefit 1 <em>Benefits of [Keyword]</em>\n\n<em>Benefit 1: Increased Efficiency and Productivity</em>\n\nOne of the key benefits of [Keyword] is its ability to significantly improve efficiency and productivity. By utilizing [Keyword] in your work processes, you can streamline various tasks, eliminate unnecessary steps, and automate repetitive actions. This ultimately frees up valuable time and allows you to focus on more important aspects of your work.\n\nFor example, in a marketing agency, implementing [Keyword] can simplify the process of creating and managing social media campaigns. With the help of advanced scheduling tools and analytics provided by [Keyword], marketers can effortlessly plan, schedule, and analyze their social media posts across multiple platforms. This not only saves time but also enables them to optimize their social media strategy based on real-time data, resulting in improved campaign performance and higher engagement rates.\n\nIn addition to time-saving features, [Keyword] also offers various tools and integrations that enhance collaboration and teamwork. Project management platforms equipped with [Keyword] capabilities enable team members to assign tasks, communicate, and share files seamlessly. This eliminates the need for constant email exchanges and promotes a more efficient workflow, especially when working on complex projects with tight deadlines.\n\nBy harnessing the power of [Keyword], businesses can easily create efficient workflows, automate repetitive tasks, and enhance collaboration, ultimately leading to increased productivity.\n\n<em>Benefit 2: Enhanced Decision-Making and Data Analysis</em>\n\nAnother notable benefit of [Keyword] is its ability to provide valuable insights and facilitate data-driven decision-making. With the vast amount of information generated by modern businesses, having a reliable system to organize, analyze, and interpret data is crucial.\n\nBy utilizing [Keyword], businesses can gather and consolidate data from various sources, allowing for a comprehensive view of their operations. Advanced reporting and visualization features provided by [Keyword] enable businesses to identify trends, patterns, and key performance indicators, empowering them to make informed decisions based on solid data.\n\nFor instance, in the retail industry, businesses utilizing [Keyword] can analyze sales data, customer behavior, and inventory levels to optimize their product offerings and marketing strategies. By understanding which products are selling well, which demographics are most likely to make a purchase, and when certain products should be replenished, businesses can make data-driven decisions that drive revenue and customer satisfaction.\n\nFurthermore, [Keyword] also provides the ability to create customized dashboards and real-time reports, giving businesses the opportunity to monitor their performance and react promptly to any deviations from their targets. This proactive approach allows for agility and quick adjustments, which can be crucial for businesses operating in rapidly changing markets.\n\nBy utilizing [Keyword]\'s data analysis capabilities, businesses can gain valuable insights, make data-driven decisions, and stay ahead of the competition.\n\n<em>Conclusion</em>\n\nIn conclusion, [Keyword] offers a multitude of benefits for businesses across various industries. From improving efficiency and productivity to enabling data-driven decision-making, [Keyword] has become an indispensable tool in today\'s fast-paced business world. By harnessing the power of [Keyword], businesses can streamline their processes, enhance collaboration, and gain valuable insights that drive growth and success. Benefit 2 In the previous sections, we have explored the definition of [Keyword], emphasized its importance, and discussed the first benefit it offers, which is increased efficiency and productivity. Now, let\'s dive into the second benefit of [Keyword]: enhanced decision-making and data analysis.\n\nBenefit 2: Enhanced Decision-Making and Data Analysis\n\nWith the massive amount of data being generated by businesses today, making informed decisions based on solid data has become crucial for success. This is where [Keyword] steps in, offering valuable insights and facilitating data-driven decision-making.\n\nBy implementing [Keyword], businesses can gather and consolidate data from various sources, providing them with a comprehensive view of their operations. The advanced reporting and visualization features offered by [Keyword] empower businesses to identify trends, patterns, and key performance indicators that may have otherwise gone unnoticed.\n\nFor example, in the retail industry, businesses can utilize [Keyword] to analyze sales data, customer behavior, and inventory levels. By understanding which products are selling well, which demographics are most likely to make a purchase, and when certain products should be replenished, businesses can make data-driven decisions that optimize their product offerings and marketing strategies. This not only drives revenue but also enhances customer satisfaction.\n\nAdditionally, [Keyword] allows businesses to create customized dashboards and real-time reports, enabling them to continuously monitor their performance. With this level of insight, businesses can quickly identify any deviations from their targets and take immediate action. In rapidly changing markets, this agility and ability to make quick adjustments can be crucial for maintaining a competitive edge.\n\nIn summary, the second benefit of [Keyword] lies in its ability to provide valuable insights and facilitate data-driven decision-making. By leveraging [Keyword]\'s data analysis capabilities, businesses can gain a comprehensive understanding of their operations, identify trends, and make informed decisions that drive growth and success.\n\nWith the versatility and functionality offered by [Keyword], it has become an indispensable tool in today\'s fast-paced business world. By utilizing [Keyword] to enhance efficiency and productivity, as well as enabling data-driven decision-making, businesses can streamline their processes, enhance collaboration, and gain valuable insights that drive growth and success.\n\nIn the next section, we will explore the third benefit of [Keyword], so stay tuned for more valuable insights. Benefit 3 <h2>Benefit 3: Improved Customer Experience and Satisfaction</h2>\n\nCustomers are the lifeblood of any business, and providing an exceptional customer experience is paramount to retaining existing customers and attracting new ones. This is where [Keyword] plays a crucial role, offering businesses the tools and insights needed to improve customer experience and satisfaction.\n\nOne way [Keyword] achieves this is through its ability to segment and analyze customer data. By examining key metrics such as purchase history, browsing behavior, and demographic information, businesses can gain a deeper understanding of their customers\' preferences and needs. With this knowledge, they can tailor their marketing efforts, personalize their communications, and offer targeted promotions to truly engage their customers.\n\nFor example, a clothing retailer using [Keyword] can identify which customer segments prefer certain styles or brands and can then create personalized recommendations and offers. By delivering targeted messages and promotions to the right customers at the right time, businesses can increase conversions and build long-lasting customer loyalty.\n\nIn addition to personalization, [Keyword] also enables businesses to enhance the customer experience by streamlining their purchasing journey. With features such as customized checkout processes and real-time inventory updates, businesses can ensure that customers have a smooth and seamless experience from start to finish. This reduces the chances of abandoned shopping carts and frustrated customers, ultimately leading to higher conversion rates and increased customer satisfaction.\n\nFurthermore, [Keyword] offers businesses the ability to provide exceptional customer support. With features like chatbots, knowledge bases, and ticket management systems, businesses can address customer inquiries and issues promptly and efficiently. This level of responsiveness not only resolves customer problems quickly but also showcases a commitment to exceptional service, fostering positive customer experiences and building a strong reputation.\n\nBy utilizing [Keyword] to improve customer experience and satisfaction, businesses are not only more likely to retain their existing customers but also attract new ones through positive word-of-mouth and online reviews. In today\'s competitive landscape, delivering exceptional customer experiences is more important than ever, and [Keyword] equips businesses with the tools needed to do just that.\n\nIn conclusion, the third benefit of [Keyword] revolves around improving customer experience and satisfaction. Through data segmentation, personalization, streamlined purchasing journeys, and exceptional customer support, businesses can create memorable experiences that keep customers coming back for more.\n\nStay tuned for the next section where we will explore the fourth benefit of [Keyword] - increased profitability and ROI. How to [Action] with [Keyword] Step 1: [Step Name] <h2>How to [Action] with [Keyword]</h2>\n\n<p>Step 1: [Step Name]</p>\n\n<p>Now that we understand the definition and importance of [Keyword], let\'s dive into the practical steps of how to [Action] using [Keyword]. The first step in achieving success with [Keyword] is [Step Name].</p>\n\n<p>[Step Name] is an essential part of the process as it sets the foundation for effectively incorporating [Keyword] into your [Action]. This step involves [Description of Step Name]. By following this step diligently, you can ensure that you are on the right track towards achieving your desired outcome.</p>\n\n<p>One key aspect to keep in mind during [Step Name] is [Important Consideration]. This will help you make the most out of [Keyword] and maximize its impact on your [Action]. By being mindful of this consideration, you can avoid potential pitfalls and optimize your results.</p>\n\n<p>[Step Name] also involves [Additional Details or Tips]. These details can vary depending on your specific [Action], but they play a crucial role in successfully incorporating [Keyword]. Paying attention to these finer points can make a significant difference in the effectiveness of your [Action] and help you stand out from the competition.</p>\n\n<p>Don\'t rush through [Step Name] or consider it as a mere formality. Take the time to understand its significance and execute it with care. Doing so will set you up for success as you move on to the next steps in incorporating [Keyword] into your [Action].</p>\n\n<p>By following [Step Name] diligently and taking into account the important considerations and additional details, you will be on your way to mastering how to [Action] with [Keyword]. The next step in the process is [Step 2], which we will discuss in the following section.</p> Step 2: [Step Name] <p>Step 2: [Step Name]</p>\n\n<p>With a solid foundation established in [Step 1], it\'s time to move on to the next crucial step in incorporating [Keyword] into your [Action]: [Step 2: Step Name]. This step builds upon the progress made in the previous step and takes you closer to achieving your desired outcome with [Keyword].</p>\n\n<p>[Step 2: Step Name] focuses on [Description of Step Name]. This step involves [Action or Process] that will further enhance your ability to effectively utilize [Keyword] in your [Action]. By mastering this step, you\'ll gain a deeper understanding of how [Keyword] can impact and elevate your [Action].</p>\n\n<p>As with any step, it\'s important to consider [Important Consideration]. This consideration will ensure that you make the most out of [Keyword] during [Step 2]. By paying attention to this aspect, you can avoid potential pitfalls and maximize the benefits that [Keyword] brings to your [Action].</p>\n\n<p>Additionally, [Step 2: Step Name] includes [Additional Details or Tips] that are integral to your success. These details may vary depending on your specific [Action], but they play a crucial role in effectively incorporating [Keyword]. By closely following these details, you can refine your approach and distinguish yourself from the competition.</p>\n\n<p>It\'s important not to rush through [Step 2: Step Name]. Take the time to fully grasp its significance and execute it diligently. By doing so, you\'ll be setting yourself up for continued success as you progress further in incorporating [Keyword] into your [Action].</p>\n\n<p>By diligently following [Step 2: Step Name], considering the important aspects, and implementing the additional details, you\'ll be well on your way towards mastering [Action] with [Keyword]. The next step in the process is [Step 3], which we will explore in the following section.</p>\n\n<p>Stay tuned as we continue our journey towards unlocking the full potential of [Keyword] in your [Action]. By understanding and implementing each step, you\'ll be able to achieve remarkable results and stand out from the crowd.</p> Step 3: [Step Name] <p>With Step 2: [Step Name] successfully completed, it\'s time to move forward and delve into the next crucial step in incorporating [Keyword] into your [Action]: Step 3: [Step Name]. This step takes the progress made in the previous steps and builds upon it, bringing you closer to achieving your desired outcome with [Keyword].</p>\n\n<p>Step 3: [Step Name] focuses on [Description of Step Name]. In this step, you will be [Action or Process] to enhance your ability to effectively utilize [Keyword] in your [Action]. By mastering this step, you will gain a deeper understanding of how [Keyword] can impact and elevate your [Action], ensuring optimal results.</p>\n\n<p>As with any step, it is important to consider [Important Consideration]. This consideration will ensure that you make the most out of [Keyword] during Step 3. By paying attention to this aspect, you can avoid potential pitfalls and maximize the benefits that [Keyword] brings to your [Action].</p>\n\n<p>Furthermore, Step 3: [Step Name] includes [Additional Details or Tips] that are vital to your success. These details may vary depending on your specific [Action], but they play a crucial role in effectively incorporating [Keyword]. By closely following these details, you can refine your approach and set yourself apart from the competition.</p>\n\n<p>Remember not to rush through Step 3: [Step Name]. Take the time to fully grasp its significance and execute it diligently. By doing so, you will be setting yourself up for continued success as you progress further in incorporating [Keyword] into your [Action].</p>\n\n<p>By diligently following Step 3: [Step Name], considering the important aspects, and implementing the additional details, you will be well on your way towards mastering [Action] with [Keyword]. The next step in the process is [Step 4], which we will explore in the following section.</p>\n\n<p>Stay tuned as we continue our journey towards unlocking the full potential of [Keyword] in your [Action]. By understanding and implementing each step, you will be able to achieve remarkable results and stand out from the crowd.</p> Tips for [Keyword] Success Tip 1', 'no', '2023-08-14 14:19:07', '2023-08-14 14:23:15'),
(4, 'چگونه-یک-برنامه-موبایل-می-تواند-به-شما-در-انجام-وظایف-روزمره-کمک-کند', 'چگونه یک برنامه موبایل می تواند به شما در انجام وظایف روزمره کمک کند', NULL, '[Main Image: تصویر اصلی در مقاله نشان می دهد که چگونه یک برنامه موبایل می تواند به شما در انجام وظایف روزمره کمک کند. دو دست تلفن همراه به تصویر حاکم هستند و در حال اجرای برنامه های مختلف هستند. به عنوان مثال، یک دست پر از لیست خرید و دست دیگری مشغول به باز کردن نقشه مکانی می باشد. این تصویر نمایانگر کارآیی و کاربردی بودن برنامه های موبایل را نشان می دهد.] Introduction <p>Introduction:</p>\n<p>همه ما موظف به انجام وظایف روزمره هستیم؛ با این حال، زمان و امکانات محدود ممکن است باعث شود به سختی توانایی انجام همه این وظایف را بروز دهیم. در این موارد، یک برنامه موبایل می تواند به شما به عنوان یک کمک همراه در انجام وظایف روزمره کمک کند. این برنامه ها معمولا قابلیت های متنوعی را ارائه می دهند که به شما کمک می کند تا بهتر و سریعتر وظایف خود را انجام دهید.</p>\n<p>یکی از اصلی ترین مزایای استفاده از برنامه های موبایل برای انجام وظایف روزمره این است که شما همیشه برنامه ها و اطلاعات خود را به راحتی و به سادگی در دسترس خواهید داشت. برنامه های موبایل را می توانید به راحتی بر روی تلفن همراه یا تبلت خود نصب کنید و از آن ها هر زمان که نیاز داشته باشید استفاده کنید. بدون نیاز به لپ تاپ یا کامپیوتر، تکنولوژی موبایل به شما این امکان را می دهد تا وقتی که در حرکت هستید، به آخرین اطلاعات و برنامه ها خود دسترسی داشته باشید.</p> Increased Efficiency <p>ایجاد کارایی بیشتر یکی از مزایای اصلی استفاده از برنامه های موبایل برای انجام وظایف روزمره است. با استفاده از برنامه های موبایل، شما می توانید وظایف خود را به صورت سریعتر و بهتر انجام دهید. به عنوان مثال، با داشتن یک برنامه موبایل برای مدیریت وظایف روزانه، شما می توانید لیست کاملی از تمام وظایفتان را داشته باشید، آنها را به ترتیب اولویت بچینید و به راحتی زمان برای هر کدام اختصاص دهید. این روش نه تنها به شما کمک می کند تا چیدمان بهتری از وظایف خود داشته باشید، بلکه از روزمرگی و اجرای تصادفی وظایف هم جلوگیری می کند.</p> Task Management <p>Task management is an essential part of our daily lives. Whether it\'s keeping track of deadlines, organizing appointments, or managing household chores, staying on top of our tasks can often be a challenging endeavor. However, thanks to the advancements in mobile technology, we now have the convenience of carrying our task management tools right in our pockets. Mobile applications have revolutionized the way we handle our daily tasks, providing us with a wide range of features and benefits that make our lives easier and more organized.</p>\n\n<p>One of the key advantages of using a mobile app for task management is the ability to access your tasks anytime, anywhere. With just a few taps on your smartphone, you can quickly view and update your task list, ensuring that nothing slips through the cracks. Whether you\'re at home, in the office, or on the go, having a mobile app at your fingertips allows you to stay constantly connected to your tasks and stay ahead of your deadlines.</p>\n\n<p>Mobile task management apps also offer a variety of features that help streamline and simplify the task management process. These apps often include features such as reminders, notifications, and priority settings, which enable you to prioritize your tasks and ensure that nothing important gets overlooked. Additionally, many apps allow you to create task categories or tags, making it easier to organize and sort your tasks according to different projects or areas of your life.</p>\n\n<p>Another benefit of using a mobile app for task management is the ability to collaborate and share tasks with others. Whether you\'re working on a team project or delegating tasks to family members, mobile task management apps allow you to assign tasks, set deadlines, and track progress in real-time. This not only improves communication and coordination but also ensures that everyone is on the same page and working towards a common goal.</p>\n\n<p>Furthermore, mobile task management apps often come with built-in productivity tools that can help you stay focused and motivated. From timers and progress trackers to habit trackers and goal-setting features, these apps offer a range of tools that can boost your productivity and help you accomplish your tasks more efficiently. With the ability to set reminders, create recurring tasks, and track your progress, you can stay motivated and stay on track towards achieving your goals.</p>\n\n<p>In conclusion, mobile apps have revolutionized the way we manage our tasks and stay organized. With their convenience, accessibility, and range of features, mobile task management apps provide us with the tools we need to effectively manage our daily tasks, improve productivity, and stay on top of our commitments. Whether you\'re a busy professional, a student, or a homemaker, incorporating a mobile app into your task management routine can bring tremendous benefits and make your life easier and more efficient.</p> Time Management <p>مدیریت زمان یکی از مهارت‌های مهم در زندگی روزمره است و یک برنامه موبایل می تواند به شما در بهبود مهارت‌های مدیریت زمان کمک کند. با استفاده از برنامه‌های موبایل، شما می توانید وظایف روزمره خود را برنامه‌ریزی کنید و زمان بندی مناسبی برای آنها در نظر بگیرید. با ایجاد برنامه‌های روزانه، هفتگی و ماهانه، می توانید به طور مداوم و از پیش برنامه ریزی کنید و به خوبی از زمان خود استفاده کنید.</p>\n\n<p>یک برنامه مدیریت زمان موبایل همچنین به شما کمک می کند تا خود را متمرکز کنید و از تفریح و ترفند هایی که زمان شما را هدر می‌دهند، خودداری کنید. با تعیین زمان مشخصی برای انجام هر وظیفه، شما می توانید از تردیدهای ناشی از عدم تمرکز کردند تاحد امکان پیش بگیرید و به طور موثر و کارآمد به اهداف خود برسید.</p>\n\n<p>در آخر، برنامه موبایل شما می تواند به شما کمک کند تا وظایف خود را به صورت منظم و مرتب انجام دهید. با استفاده از یادآورها و هشدارها در برنامه خود، شما می توانید به خوبی پیگیری کنید و وظایف را به موقع انجام دهید. همچنین، امکان ایجاد لیست وظایف و نشانه‌گذاری وظایف انجام شده در برنامه شما وجود دارد که به شما احساس رضایت و موفقیت می‌دهد.</p> Collaboration <p>One of the ways a mobile application can help you with daily tasks is by promoting collaboration. Many mobile apps offer features that allow users to collaborate with others in real-time, regardless of their location. This can be especially beneficial for tasks that require input or coordination from multiple people. For example, if you\'re working on a group project or planning an event, a collaborative mobile app can enable you to easily share information, assign tasks, and communicate with your team members. This eliminates the hassle of constantly emailing or messaging back and forth, streamlining the collaboration process and making it more efficient.</p> Increase Productivity <p>One of the main ways that a mobile application can help you with your daily tasks is by increasing your productivity. With the right app, you can streamline various aspects of your life and accomplish more in less time.</p>\n\n<p>Firstly, a mobile app can help you stay organized. Many apps offer features such as to-do lists, reminders, and calendars that can keep track of your tasks and appointments. By having all of this information in one place, you can easily prioritize your tasks and manage your time more effectively.</p>\n\n<p>Secondly, a mobile app can automate certain tasks for you, saving you valuable time and effort. For example, you can set up automatic bill payments through a finance app, eliminating the need to manually make payments every month. Similarly, you can automate repetitive tasks such as sending emails or generating reports, allowing you to focus on more important work.</p>\n\n<p>In addition, a mobile app can provide easy access to information and tools that you need to complete your daily tasks. Whether it\'s a language translation app, a recipe app, or a fitness tracking app, having these resources at your fingertips can make your life a lot easier. Instead of spending time searching for information or looking for the right tools, you can quickly access everything you need through a mobile app.</p>\n\n<p>Lastly, a mobile app can help you collaborate with others more efficiently. Many apps offer features for sharing documents, scheduling meetings, and communicating with teammates. This can be especially beneficial if you work remotely or have a team spread out in different locations. By using a mobile app, you can stay connected and work together seamlessly, regardless of where you are.</p> Conclusion <p>In conclusion, a mobile application can be an invaluable tool in helping you complete your daily tasks more efficiently. Whether it is organizing your schedule, managing your finances, or staying connected with others, these apps offer convenience and ease of use that can greatly enhance your productivity. </p>\n\n<p>With features such as reminders, calendars, and to-do lists, a mobile app can help you stay organized and ensure that you never miss an important deadline or appointment. By having all your tasks and commitments in one place, you can easily prioritize and manage your time effectively.</p>\n\n<p>Additionally, mobile apps can also assist you in managing your finances. From tracking expenses to creating budgets, these apps provide a convenient way to keep tabs on your money. With the ability to link your bank accounts and credit cards, you can easily monitor your spending, set savings goals, and receive alerts for any unusual activity.</p>\n\n<p>Furthermore, mobile apps can keep you connected with others, even when you are on the go. With messaging apps, social media platforms, and video calling features, you can stay in touch with family, friends, and colleagues no matter where you are. This connectivity not only helps you stay updated and informed, but also enables collaboration and seamless communication.</p>\n\n<p>In summary, by utilizing mobile apps, you can streamline your daily tasks, boost your productivity, and simplify your life. With their convenience and features tailored to various needs, these apps can be indispensable tools in today\'s fast-paced world. So, why not take advantage of the power of mobile technology and make your life easier?</p>', 'yes', '2023-08-14 14:41:55', '2023-08-14 14:45:22'),
(5, 'چگونه-یک-برنامه-موبایل-می-تواند-به-شما-در-انجام-وظایف-روزمره-کمک-کند', 'چگونه یک برنامه موبایل می تواند به شما در انجام وظایف روزمره کمک کند', NULL, '[Main Image: تصویر اصلی مقاله نشان دهنده یک گوشی هوشمند در دست یک فرد است که برنامه موبایل را در حال استفاده است. فرد در حال انجام یک وظیفه روزمره است و در صفحه ی نمایش گوشی، برنامه موبایل به او کمک می کند تا وظایف روزانه خود را مدیریت کند.] Introduction <p>همه ما در زندگی روزمره خود با وظایف و کارهای مختلفی سر و کار داریم که باید به آن‌ها پاسخ دهیم. از چیدن لباس، تهیه صبحانه، تمیز کردن خانه یا ماشین، انجام کارهای مرحله به مرحله در حین روز، تهیه خریدها و غیره. اما گاهی اوقات تعداد زیادی وظیفه می‌تواند به ما مستلزم وقت و تمرکز زیادی باشد. به خوشبختی، برنامه های موبایل می‌توانند به ما در انجام وظایف روزمره کمک کنند و زمان ما را صرفه جویی کنند.</p>\n\n<p>استفاده از برنامه های موبایل معمولاً به ما کمک میکند تا وظایفمان را سازماندهی کنیم و بهتر برنامه‌ریزی کنیم. برنامه هایی که برای کمک به ما در انجام وظایف روزمره طراحی شده‌اند، امکانات مختلفی را در اختیارمان قرار می‌دهند. مثلاً می‌توانند یادآوری هایی را به ما دهند که به مشاغل و وظایف مختلف اطلاع‌رسانی کنند، زمانبندی کنند، لیست خریدها و کارهایی که باید انجام دهیم را ثبت کنند و بهبود عملکرد و کارایی ما را افزایش دهند.</p>\n\n<p>علاوه بر این، برنامه های موبایل می‌توانند به ما در انجام کارها در حین روز کمک کنند. برخی از این برنامه ها قابلیتهایی برای سازماندهی کارها و اولویت‌بندی آن‌ها را دارند. به این ترتیب می‌توانیم وظایف را به ترتیب اهمیت انجام دهیم و نیازی به صرف وقت و انرژی اضافی برای تصمیم‌گیری در هر لحظه نداشته باشیم. همچنین، با استفاده از برنامه های موبایل، می‌توانیم تقسیم‌بندی کارها را کنترل کنیم و به تمامی کارهای روزمره‌مان پاسخ دهیم، حتی آن‌هایی که قبلا از یادمان رفته بود.</p> Time Management Task Management <p>مدیریت زمان و وظایف می تواند برای هر فرد بسیار مهم باشد. در دنیای امروز پرتنش و پرسرعت، امکان دست‌یافتن به همه وظایف روزمره می‌تواند چالش برانگیز باشد. اما با استفاده از یک برنامه موبایل مناسب، می توانید این چالش را به راحتی مدیریت کنید.</p>\n\n<p>یک برنامه موبایل که به شما در انجام وظایف روزمره کمک می کند، می تواند شامل ویژگی های مختلفی باشد. یکی از این ویژگی ها، مدیریت زمان می باشد. برنامه موبایل می تواند به شما در تعیین و مدیریت زمان مورد نیاز برای هر وظیفه کمک کند. با قرار دادن زمان برای هر وظیفه در برنامه موبایل، شما می توانید به راحتی برنامه ریزی کنید و مطمئن باشید که هیچ وظیفه ای از دست نخواهید داد.</p>\n\n<p>وظیفه مدیریت نیز به طور معمول در برنامه های موبایل وجود دارد. با استفاده از این برنامه ها، شما می توانید لیست وظایف خود را سازماندهی کنید و به راحتی به آنها دسترسی داشته باشید. برنامه موبایل می تواند به شما یادآوری کند که وظایفی که باید انجام دهید را چک کنید و با مشاهده لیست وظایف باقیمانده، مطمئن باشید که هیچ کاری را فراموش نکرده اید.</p>\n\n<p>علاوه بر مدیریت زمان و وظایف، برنامه های موبایل می توانند به شما در انجام دادن وظایف روزمره به صورت موثر کمک کنند. برخی از برنامه ها قابلیت تنظیم اولویت ها را نیز دارند و به شما کمک می کنند وظایف مهم را در لحظه انجام دهید. با این ویژگی، شما می توانید به بهترین شکل ممکن به وظایف خود بپردازید و از وقت و انرژی خود صرفه جویی کنید.</p>\n\n<p>بنابراین، اگر به دنبال راهی برای بهترین استفاده از زمان خود و مدیریت بهتر وظایف خود هستید، یک برنامه موبایل ممکن است به اندازه کافی کارآمد باشد. با استفاده از این برنامه ها، شما می توانید به صورت سازماندهی و موثرتر وظایف خود را انجام دهید و به راحتی همه چیز را زیر کنترل داشته باشید.</p> Scheduling and Reminders <p>برنامه های موبایل قدرتمندی برای مدیریت زمان و برنامه ریزی می باشند. با استفاده از این برنامه ها، شما می توانید برنامه روزانه خود را داشته باشید و زمان های مختلف را برای وظایف خاص تعیین کنید. برنامه ها می توانند به شما یادآوری کنند که وقتی فعالیت مشخصی را انجام دهید، اپلیکیشن را باز کنید و آن را تکمیل کنید. برنامه ها همچنین می توانند به شما اجازه دهند تا بسته به نیاز خود، زمانبندی های متفاوتی را برای هر وظیفه و فعالیت تنظیم کنید. با استفاده از این امکانات، شما می توانید برنامه روزانه خود را به راحتی مدیریت کنید و به موقع وظایف خود را انجام دهید.</p>\n\n<p>یادآوری ها همچنین بخش مهمی از برنامه های موبایل برای مدیریت وظایف هستند. شما می توانید با ایجاد یادآوری های مختلف برای وظایف خود، به راحتی هر زمان که ضرورت دارد یادآوری شوید. این یادآوری ها می توانند شامل اعلان ها، پیام ها و حتی ایمیل ها باشند. با این روش، شما مطمئن می شوید که هیچ کاری را از دست نداده اید و به موقع وظایف خود را انجام می دهید.</p>\n\n<p>برنامه های موبایل همچنین امکان اشتراک گذاری برنامه را با دیگران دارند. با اشتراک گذاری برنامه، شما می توانید وظایف خود را با دیگر افراد مشترک کنید و به راحتی با آنها همکاری کنید. شما می توانید یک برنامه مشترک برای خانواده یا یک گروه کاری ایجاد کنید و وظایف خود را به اشتراک بگذارید. با این روش، شما می توانید به صورت موثرتر و بهینه تر با دیگران همکاری کنید و تمامی وظایف را به طور مشترک پیگیری کنید.</p> Productivity Tracking', 'no', '2023-08-14 16:17:23', '2023-08-14 16:20:33'),
(7, 'چگونه-یک-برنامه-موبایل-می-تواند-به-شما-در-انجام-وظایف-روزمره-کمک-کند', 'چگونه یک برنامه موبایل می تواند به شما در انجام وظایف روزمره کمک کند', NULL, '[Main Image: تصویر اصلی این مقاله یک دستگاه موبایل است که از روی میز قرار گرفته است. بر روی صفحه ی نمایش دستگاه، تصویر یک لیست وظایف روزمره قابل مشاهده است و در پشت صفحه، یک دست در حال نوشتن را می توان دید. این تصویر نشان دهنده چگونگی استفاده از یک برنامه موبایل برای مدیریت وظایف روزمره و کمک در اجرای آنها می باشد.]', 'no', '2023-08-14 16:30:25', '2023-08-14 16:30:25'),
(8, 'چگونه-یک-برنامه-موبایل-می-تواند-به-شما-در-انجام-وظایف-روزمره-کمک-کند', 'چگونه یک برنامه موبایل می تواند به شما در انجام وظایف روزمره کمک کند', NULL, '[Main Image: تصویر اصلی مقاله نشان دهنده یک گوشی موبایل است که در دست یک فرد است. فرد در حال استفاده از برنامه موبایل خود برای انجام وظایف روزمره است، همچون برنامه ریزی روزانه، ارسال پیام، پرداخت قبوض و دسترسی به اطلاعات مورد نیاز است.]', 'no', '2023-08-14 16:34:18', '2023-08-14 16:34:18'),
(9, 'چگونه-یک-برنامه-موبایل-بسازیم؟', 'چگونه یک برنامه موبایل بسازیم؟', NULL, '[Main Image: An illustration showcasing a person using a laptop with a mobile application design interface displayed on its screen. The image highlights the process of building a mobile app, showcasing various elements like a navigation bar, buttons, and content sections.] معرفی برنامه‌ نویسی موبایل چیستی برنامه‌نویسی موبایل با معرفی برنامه‌نویسی موبایل شروع کنیم. برنامه‌نویسی موبایل به مجموعه‌ای از فرآیندها و تکنیک‌هایی اطلاق می‌شود که برای ساختن برنامه‌های قابل اجرا بر روی دستگاه‌های همراه مورد استفاده قرار می‌گیرند. این نوع برنامه‌نویسی از زبان‌های برنامه‌نویسی اصلی مانند جاوا، سوئیفت و کاتلین استفاده می‌کند.\n\nبرنامه‌نویسی موبایل با ارائه امکاناتی برای ساختن برنامه‌های متنوع و کاربردی بر روی دستگاه‌های همراه، یک فرصت بسیار خوب برای توسعه‌دهندگان فراهم می‌کند. با این روش، می‌توانید برنامه‌هایی را بسازید که امکاناتی همچون دسترسی به دوربین، موقعیت مکانی، حسگرها و دریافت اطلاعیه‌ها را دارند.\n\nهمچنین، برنامه‌نویسی موبایل به شما این امکان را می‌دهد تا برنامه‌هایی با واسط کاربری زیبا و ساده ایجاد کنید. با استفاده از ابزارها و کتابخانه‌های مناسب، می‌توانید طرح‌های جذاب و کارآمدی برای برنامه‌های موبایل خود طراحی کنید و به تجربه کاربری بهتری برسید.\n\nبرنامه‌نویسی موبایل نیز امکان ساخت برنامه‌های چندسکویی را فراهم می‌کند. این به معنای این است که می‌توانید یک برنامه را به‌طور همزمان برای سیستم‌عامل‌های مختلف مانند iOS و Android توسعه دهید. این باعث می‌شود تا کاربران از هر دو پلتفرم بهره‌برداری کنند و شما نیز بازار بیشتری را برای توسعه برنامه‌های خود در نظر داشته باشید.\n\nدر نهایت، برنامه‌نویسی موبایل فرصتی فراهم می‌کند تا از توانایی‌های خود برای کسب درآمد استفاده کنید. می‌توانید برنامه‌های تجاری، بازی‌ها و نرم‌افزارهای دیگری را بسازید و از آن‌ها به عنوان منبع درآمد در طولانی مدت استفاده کنید.\n\nبه طور کلی، برنامه‌نویسی موبایل یک حوزه جذاب و پرفراز و نشیب برای توسعه‌دهندگان است. با استفاده از این تکنولوژی‌ها می‌توانید برنامه‌های مفید و خلاقانه‌ای را بسازید و در جهان دیجیتال نقش خود را ایفا کنید. قدم اول برای شروع ساخت برنامه موبایل متعلق به شماست! نکات مهم برای برنامه‌ نویسی موبایل <p>معرفی برنامه‌نویسی موبایل و نکات مهم برای برنامه‌نویسی موبایل</p>\n\n<p>برنامه‌نویسی موبایل یک زمینه رو به رشد و جذاب برای توسعه‌دهندگان است. با پیشرفت تکنولوژی‌های موبایل و استفاده همیشگی افراد از دستگاه‌های همراه، ساختن برنامه‌های قابل اجرا بر روی این دستگاه‌ها فرصت بی‌نظیری برای توسعه‌دهندگان فراهم می‌کند. در ادامه به معرفی برنامه‌نویسی موبایل و برخی نکات مهم برای برنامه‌نویسی موبایل می‌پردازیم.</p>\n\n<p>اولین نکته مهم در برنامه‌نویسی موبایل استفاده از زبان‌های برنامه‌نویسی اصلی می‌باشد. برای توسعه برنامه‌های موبایل، از زبان‌هایی مانند جاوا، سوئیفت و کاتلین استفاده می‌شود. انتخاب زبان برنامه‌نویسی مناسب، تسهیل در توسعه و عملکرد بهینه برنامه‌ها را تضمین می‌کند.</p>\n\n<p>دومین نکته مهم در برنامه‌نویسی موبایل، امکاناتی است که برنامه می‌تواند داشته باشد. برنامه‌های موبایل، امکاناتی همچون دسترسی به دوربین، موقعیت مکانی، حسگرها و دریافت اطلاعیه‌ها را دارا می‌باشند. بنابراین، در برنامه‌نویسی موبایل باید به امکانات مورد نیاز برنامه‌های خود توجه کنید و از آن‌ها بهره‌برداری کنید.</p>\n\n<p>سومین نکته مهم در برنامه‌نویسی موبایل، طراحی واسط کاربری است. با استفاده از ابزارها و کتابخانه‌های مناسب، می‌توانید طرح‌های جذاب و کارآمدی برای برنامه‌های موبایل خود طراحی کنید و به تجربه کاربری بهتری برسید. طراحی واسط کاربری زیبا و ساده در برنامه‌های موبایل، بهبود استفاده و جذابیت برنامه را در میان کاربران افزایش می‌دهد.</p>\n\n<p>چهارمین نکته مهم در برنامه‌نویسی موبایل، قابلیت چندسکویی است. به این معنا که می‌توانید یک برنامه را به‌طور همزمان برای سیستم‌عامل‌های مختلف مانند iOS و Android توسعه دهید. این باعث می‌شود تا کاربران از هر دو پلتفرم بهره‌برداری کنند و شما نیز بازار بیشتری را برای توسعه برنامه‌های خود در نظر داشته باشید.</p>\n\n<p>نهایتاً، برنامه‌نویسی موبایل فرصتی فراهم می‌کند تا از توانایی‌های خود برای کسب درآمد استفاده کنید. با ساخت برنامه‌های تجاری، بازی‌ها و نرم‌افزارهای موبایل، می‌توانید منبع درآمدی مستقل داشته باشید و از آن‌ها به عنوان منبع درآمد در طولانی مدت استفاده کنید.</p>\n\n<p>در نهایت، برنامه‌نویسی موبایل فرصت‌های بسیاری را برای توسعه‌دهندگان ایجاد می‌کند. از طریق ساخت برنامه‌های مفید و خلاقانه، می‌توانید در جهان دیجیتال نقش خود را ایفا کرده و از توانمندی‌هایتان استفاده کنید. پس، قدم اول برای شروع ساخت برنامه موبایل برداشته شده و فرصت‌های جدیدی در پیش روی شماست.</p> انواع پلتفرم‌های موجود', 'no', '2023-08-14 16:43:19', '2023-08-14 16:46:37'),
(10, 'چگونه-یک-برنامه-موبایل-بسازیم؟', 'چگونه یک برنامه موبایل بسازیم؟', NULL, '[Main Image: این تصویر یک صفحه نمایش دستگاه موبایل را نشان می‌دهد که برنامه نویسی برنامه‌های موبایل را نشان می‌دهد. صفحه نمایش شامل کدهای برنامه نویسی، لایه‌های طراحی و ابزارهای مورد نیاز برای ساخت برنامه های موبایل است.]', 'yes', '2023-08-14 16:50:10', '2023-08-14 16:50:10'),
(11, '', NULL, NULL, '[Main Image: The image showcases a group of people engaged in a business meeting inside a brightly lit conference room. They are seated around a well-furnished table, deep in conversation, and examining documents. The atmosphere exudes professionalism and collaboration, as everyone seems actively involved and attentive.]', 'no', '2023-08-14 16:54:27', '2023-08-14 16:54:27'),
(12, 'چگونه-یک-برنامه-موبایل-بسازیم؟', 'چگونه یک برنامه موبایل بسازیم؟', NULL, '[Main Image: ملحقان موبایل در حال کدزنی و طراحی برنامه موبایل هستند.] نیازهای مورد نیاز برای ساخت یک برنامه موبایل <قبل از شروع برنامه‌نویسی برای ساخت یک برنامه موبایل، نیازمندی‌ها و نیازهای مورد نیاز برای پروژه را باید به خوبی شناسایی کرد. در این مرحله، درک کامل از هدف و اهداف برنامه موبایل و نیازهای کاربران ضروری است. می‌توان با مراجعه به نمونه‌های موجود و تحلیل شرایط و بازار هدف، این نیازمندی‌ها را به خوبی مورد بررسی قرار داد. بعضی از نیازمندی‌های رایج شامل ظاهر جذاب و کارآمد، عملکرد صحیح و سریع، سازگاری با سیستم‌عامل‌های مختلف و آسانی استفاده از برنامه هستند.>\n\n<نیاز به برنامه‌نویسی و کدنویسی نیز برای ساخت یک برنامه موبایل ضروری است. برنامه‌نویسی می‌تواند به زبان‌های مختلفی انجام شود، از جمله زبان‌های محبوب مانند جاوا، سوئیفت، کاتلین و جاوا اسکریپت. انتخاب زبان برنامه‌نویسی بستگی به نوع برنامه و سیستم عامل مورد نظر دارد. علاوه بر زبان برنامه‌نویسی، مهارت‌های تکنیکی نیز برای ایجاد یک برنامه موبایل کاربردی لازم است. درک اصول برنامه‌نویسی، مدیریت پایگاه داده‌، طراحی وب، و گرافیک مهمترین مهارت‌هایی هستند که برنامه‌نویسان موبایل باید در اختیار داشته باشند.>\n\n<برای ساخت یک برنامه موبایل کاربردی و موثر، تست و ارزیابی مناسب ضروری است. در این مرحله، باید برنامه را به طور کامل تست کرده و از قابلیت‌ها، کاربردی بودن و پاسخگویی در شرایط مختلف اطمینان حاصل کرد. همچنین، نیاز است تا مشکلات و ایرادات موجود در برنامه شناسایی و برطرف شوند. برای این منظور، استفاده از ابزارها و فرآیندهای تست کاربردی، تست واحد و تست انتگرالی، بررسی فنی و همچنین تحلیل شیوع خطاها مفید است.>\n\n<همچنین، در هر مرحله از ساخت برنامه موبایل، نیاز به همکاری و تعامل با تیمی از افراد است که در حوزه‌های مختلف تخصص دارند. تشکیل یک تیم متخصص و متعهد می‌تواند به بهترین شکل مراحل توسعه برنامه را مدیریت کند و به ایجاد یک برنامه موبایل کارآمد کمک شایانی کند. همچنین، در طول فرآیند ساخت برنامه موبایل، نیاز است به مطالعه و یادگیری مداوم برای آشنایی با آخرین تکنولوژی‌ها و روش‌های توسعه. این کار می‌تواند کیفیت و عملکرد برنامه را بهبود بخشد و باعث رضایت و استفاده بیشتر کاربران شود.> انتخاب پلتفرم برای ساخت برنامه موبایل <p>انتخاب پلتفرم برای ساخت برنامه موبایل یکی از مهمترین تصمیماتی است که در فرآیند ساخت یک برنامه موبایل باید گرفته شود. انتخاب پلتفرم مناسب برای برنامه‌ی مورد نظر عواقب مستقیمی در موفقیت آن خواهد داشت. برای انتخاب پلتفرم مناسب باید توجه داشت که هدف اصلی از ساخت برنامه موبایل چیست؟ آیا قصد ساخت یک برنامه موبایل برای پلتفرم iOS یا Android را داریم؟ یا قصد داریم یک برنامه موبایلی تحت وب بسازیم؟ انتخاب درست پلتفرم در ابتدای کار بسیار حائز اهمیت است و باید با دقت و تجربه‌ای که در این زمینه دارید، تصمیم‌گیری کنید.</p> طراحی رابط کاربری', 'no', '2023-08-14 17:15:50', '2023-08-14 17:17:52'),
(13, 'چگونه-یک-برنامه-موبایل-بسازیم؟', 'چگونه یک برنامه موبایل بسازیم؟', NULL, '[Main Image: The main image in the article shows a group of professionals sitting around a table, engrossed in the process of building a mobile application. Focused and determined, they are brainstorming ideas, sketching wireframes, coding, and sharing insights, all with an air of excitement and collaboration. The dynamic scene reflects the essential steps and teamwork involved in creating a mobile application.] مقدمه <p>برنامه‌های موبایل به عنوان یکی از ابزارهای حیاتی در دنیای امروز به شمار می‌روند. قرار دادن یک برنامه بر روی تلفن همراه، ما را قادر می‌سازد تا به طور آسان به اطلاعات، خدمات و سرگرمی‌های مورد نیازمان دسترسی پیدا کنیم. به همین دلیل، ایجاد یک برنامه موبایل برای شغلی، کسب و کار و یا ایده‌ای خلاقانه می‌تواند بسیار سودمند و موفق‌کننده باشد.</p> مراحل طراحی برنامه موبایل انتخاب هدف و نقشه راه <p>مراحل طراحی برنامه موبایل یک فرآیند پیچیده است که نیاز به برنامه‌ریزی دقیق و مشخصی دارد. در ابتدا باید هدف و نقشه‌راه خود را انتخاب کنید. هدف باید شفاف و دقیق باشد و بر اساس آن بتوانید برنامه را طراحی کنید. برای این منظور، نیاز دارید تا فرصت‌ها و چالش‌های مختلف را بررسی کنید و مجموعه اهداف و نقشه‌راهی را تدوین کنید که باعث موفقیت برنامه شما می‌شود.</p>\n\n<p>در مرحله انتخاب هدف و نقشه‌راه، باید بازار مورد نظر خود را مورد بررسی قرار دهید. باید بفهمید که چه اهدافی را می‌توانید با برنامه موبایل خود دنبال کنید و در بازار موجود چه فضایی برای رشد و پیشرفت وجود دارد. شناخت رقبا و تحلیل تقاضا و عرضه نیز از جمله مواردی هستند که در انتخاب هدف و نقشه‌راه باید به آن‌ها توجه کنید.</p>\n\n<p>روش‌های مختلفی برای انتخاب هدف و نقشه‌راه وجود دارد. می‌توانید از روش تجزیه و تحلیل SWOT استفاده کنید. در این روش، نقاط قوت، ضعف‌ها، فرصت‌ها و تهدیدهای محیط را بررسی می‌کنید و بر اساس آن‌ها هدف و نقشه‌راه خود را تعیین می‌کنید. همچنین، می‌توانید از تکنیک SMART استفاده کنید. در این تکنیک، هدف‌های خود را مشخص و قابل اندازه‌گیری، قابل دستیابی، مرتبط و زمان‌بندی شده قرار می‌دهید.</p> تعیین نیازمندی‌ها', 'no', '2023-08-14 17:26:15', '2023-08-14 17:27:31'),
(14, '', NULL, NULL, '[Main Image: The main image in the article depicts a vibrant cityscape during sunset, with towering skyscrapers creating a mesmerizing silhouette against the colorful sky. The city lights are starting to illuminate, casting a warm glow on the bustling streets below. People can be seen walking and commuting, with some enjoying leisure activities like jogging or sitting in outdoor cafes. The image perfectly captures the vibrant energy and beauty of urban life.] Introduction', 'no', '2023-08-16 10:50:52', '2023-08-16 10:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `vendor_id`, `name`, `email`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'mr', 'mahdi@gmail.com', '09190525325', 'ffff', '2024-12-09 08:05:11', '2024-12-09 08:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `generate_image` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'no',
  `image_prompt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image_request_id` varchar(255) DEFAULT NULL,
  `description` text,
  `tools_id` int NOT NULL,
  `tools_slug` varchar(255) NOT NULL,
  `variation` varchar(255) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `content` longtext,
  `meta_title` text,
  `image_links` text,
  `meta_description` text,
  `language` varchar(255) DEFAULT 'persian',
  `count` int NOT NULL,
  `images_status` enum('waiting','generate','end','error') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'waiting',
  `status` enum('waiting','end','error') DEFAULT 'waiting',
  `messages` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `vendor_id`, `title`, `slug`, `generate_image`, `image_prompt`, `image_request_id`, `description`, `tools_id`, `tools_slug`, `variation`, `temperature`, `content`, `meta_title`, `image_links`, `meta_description`, `language`, `count`, `images_status`, `status`, `messages`, `created_at`, `updated_at`) VALUES
(1, 1, 'هوش مصنویی در حوضه هنر', 'هوش-مصنویی-در-حوضه-هنر', 'yes', 'Create a futuristic scene in an artist\'s studio where an AI robot, sleek and chrome with subtle blue LED lights, is painting on a large canvas. The style should mimic a blend of impressionism and surrealism, with vivid colors: deep blues, vibrant oranges, and soft yellows in the artwork. The studio is dimly lit by natural light coming from a large window on the left, casting dynamic shadows. The camera angle is from slightly above, looking over the robot\'s shoulder, giving a clear view of the canvas and the robot\'s intricate mechanisms.', '84c7aa3f-a2ce-4ca7-85d2-ddb9d77b74de', NULL, 19, 'instagram-assistant', NULL, 'Default', '🎨✨ هوش مصنوعی در دنیای هنر ✨🎨\n\nاستفاده از هوش مصنوعی در هنر یک پیشرفت انقلابی است که طراحی، نقاشی و حتی موسیقی را دگرگون کرده است. با استفاده از این تکنولوژی، هنرمندان قادر به خلق آثاری هستند که پیش از این تصورشان نیز غیرممکن بود. 🖌️🖼️\n\n🔹 نحوه کارکرد AI در هنر:\n۱. یادگیری: AI با مطالعه هزاران اثر هنری مختلف طرز تفکر و سبک هنرمندان بزرگ را یاد می‌گیرد.\n۲. خلاقیت: پس از یادگیری، AI شروع به خلق آثار جدید می‌کند که می‌توانند ترکیبی از چندین سبک باشند.\n۳. تکامل: هر چه از این تکنولوژی بیشتر استفاده شود، دقت و خلاقیت آن بیشتر می‌شود.\n\n📸 برای ارسال امروز، من یک نمونه از هنر تولید شده توسط AI را به اشتراک می‌گذارم. این اثر نشان‌دهنده ترکیبی از سبک‌های سنتی و مدرن است و با استفاده از الگوریتم‌های پیچیده خلق شده است.\n\n🖋️ نظر شما در مورد تأثیر هوش مصنوعی بر هنر چیست؟ آیا فکر می‌کنید AI می‌تواند جایگزین هنرمندان واقعی شود؟\n\n🔖 #هنر #هوشمصنوعی #تکنولوژی_هنری #خلاقیت #نقاشی_مدرن #هنر_دیجیتال #نوآوری_هنری\n\nهر روز با ما همراه باشید تا در جریان جدیدترین دستاوردهای هوش مصنوعی در عرصه هنر قرار بگیرید! 🌟📱', NULL, NULL, NULL, 'persian', 5, 'end', 'end', NULL, '2024-12-21 11:27:20', '2024-12-21 07:59:47'),
(2, 2, 'آموزش درست کردن غذای قرمه سبزی', 'آموزش-درست-کردن-غذای-قرمه-سبزی', 'yes', 'Create a vibrant and detailed image set in a rustic kitchen with warm, soft lighting that highlights an older Indian woman teaching a young girl how to make Korma Sabzi. The setting includes a wooden table with various colorful spices and fresh green vegetables spread around. The scene shows mid-action of stirring a traditional clay pot. Capture the scene in a medium close-up shot to focus on the interaction and the food preparation details, using a color palette of earth tones enhanced by the green of the herbs and spices.', '7f75242f-68a6-4014-8f04-88de2787484c', NULL, 19, 'instagram-assistant', NULL, 'Default', '🍲 *آموزش تهیه خورش کرمه سبزی* 🌿\n\nیکی از خوشمزه‌ترین و محبوب‌ترین خورش‌های ایرانی، خورش کرمه سبزی است که با عطر و طعم بی‌نظیرش، همیشه طرفداران زیادی دارد. در این پست قدم به قدم با شما هستیم تا یک کرمه سبزی عالی و خوش طعم تهیه کنید.\n\n📝 مواد لازم:\n- گوشت چرخ‌کرده: ۵۰۰ گرم\n- سبزی خورشتی (تره، جعفری، گشنیز، شنبلیله): ۷۵۰ گرم\n- پیاز: ۲ عدد بزرگ\n- لوبیا قرمز: ۱ پیمانه\n- رب گوجه‌فرنگی: ۲ قاشق غذاخوری\n- نمک، فلفل و زردچوبه: به میزان لازم\n- آبلیمو یا آبغوره: ۲ قاشق غذاخوری\n- روغن: به میزان لازم\n\n🔪 طرز تهیه:\n1️⃣ ابتدا پیازها را خرد کرده و در روغن تفت دهید تا طلایی شود.\n2️⃣ گوشت چرخ‌کرده را اضافه کرده و تفت دهید تا رنگ آن تغییر کند.\n3️⃣ زردچوبه، نمک و فلفل را اضافه کنید و خوب مخلوط کنید.\n4️⃣ سبزی‌های خرد شده را اضافه کرده و تفت دهید تا آب آن کم شود.\n5️⃣ رب گوجه‌فرنگی را اضافه کرده و خوب تفت دهید.\n6️⃣ لوبیا قرمز را که از قبل خیس کرده‌اید، اضافه کنید.\n7️⃣ مقدار کافی آب اضافه کرده و اجازه دهید خورش برای ۲ ساعت با حرارت ملایم بپزد.\n8️⃣ در آخر، آبلیمو یا آبغوره را اضافه کنید و بگذارید چند دقیقه دیگر بجوشد.\n\n📸 عکس بگیرید و با دوستانتان به اشتراک بگذارید! نوش جان! 😋\n\n📌 نکات:\n- استفاده از سبزی تازه به جای خشک کیفیت طعم خورش را بالا می‌برد.\n- می‌توانید به جای لوبیا قرمز از لوبیا چیتی استفاده کنید.\n\n🔖 #خورش_کرمه_سبزی #آشپزی_ایرانی #غذای_ایرانی #آموزش_آشپزی #غذای_سنتی #خوشم', NULL, NULL, NULL, 'persian', 10, 'end', 'end', NULL, '2024-12-21 11:50:34', '2024-12-21 08:24:24'),
(3, 2, 'آموزش دوخت پیراهن مردانه', 'آموزش-دوخت-پیراهن-مردانه', 'yes', '\"Create a detailed image of a men\'s shirt sewing class in a cozy, well-lit tailor workshop. The scene features three individuals of diverse ethnicities, engaged in sewing by hand under the warm glow of overhead vintage lamps. The environment should have wooden work tables scattered with colorful fabric scraps, measuring tapes, and thread spools. Include a variety of traditional wooden tools and sewing machines. Artistic style should lean towards realism with soft focus in the background, and a frontal, slightly elevated camera angle to capture both the learners and the detailed textures of the fabrics.\"', '3adbc622-79d3-4798-9b00-2ff73d49f2fd', NULL, 19, 'instagram-assistant', NULL, 'Default', '👔 آموزش دوخت پیراهن مردانه 👔\n\n‌‌🌟 با من همراه باشید تا با هم قدم به قدم دوخت یک پیراهن مردانه شیک و زیبا را یاد بگیریم. خواهید دید که با کمی دقت و صبر، می‌توانید پیراهنی ایده‌آل بدوزید که هم کیفیت عالی دارد و هم ظاهری آراسته! 🧵✂️\n\n### مراحل دوخت پیراهن مردانه:\n\n1. **انتخاب پارچه**: اولین قدم انتخاب پارچه‌ای با کیفیت و مناسب است. پیشنهاد می‌کنم از پارچه‌های کتان یا پنبه‌ای استفاده کنید که هم راحتی دارند و هم دوام بالایی دارند.\n\n2. **الگوبرداری**: از الگوی پیراهن مردانه استاندارد استفاده کنید و آن را بر اساس سایز مورد نظر خود تنظیم کنید.\n\n3. **برش زدن**: با دقت بر اساس الگوی خود برش‌ها را روی پارچه انجام دهید. مطمئن شوید که برش‌ها دقیق و تمیز باشند.\n\n4. **دوخت اجزای پیراهن**: ابتدا قسمت‌های جلو و پشت پیراهن را به هم بدوزید. سپس آستین‌ها و یقه را اضافه کنید.\n\n5. **انجام دوخت‌های تکمیلی**: دکمه‌ها و جیب‌های پیراهن را به دقت دوخته و پیراهن را تمام کنید.\n\n6. **اتو کشی**: پس از تکمیل دوخت، پیراهن را اتو کشی کنید تا ظاهری آراسته و تمیز داشته باشد.\n\n### کپشن پیشنهادی برای پست:\n👔 \"خودتان را در بهترین حالت نشان دهید! دوخت پیراهن مردانه، هنری که هر مردی باید آن را بیاموزد. 🧵✨ #خیاطی_با_عشق\"\n\n### هشتگ‌ها:\n#آموزش_دوخت #پیراهن_مردانه #خیاطی #مد_مردانه #هنر_دستی #خودت_بدوز #خیاطی_خانگی #آموزش_خیاطی #دوخت_پیراهن #پارچه #دوخت_مردانه\n\nبا انتشار این محتوا در اینستاگرام، نه تنها می‌توانید مخاطبان خود را به دنیای دوخت و دوز وارد کنید، بلکه می‌توانید جامعه‌ای از علاقه‌مندان به خیاطی را نیز گرد هم آ', NULL, NULL, NULL, 'persian', 0, 'end', 'end', NULL, '2024-12-21 11:59:29', '2024-12-21 08:31:08'),
(4, 2, 'در حوضه لوله های پایپ', 'در-حوضه-لوله-های-پایپ', 'yes', 'Create an intricate, steampunk-style image depicting the basin of a giant, elaborate system of twisting and interconnected brass pipes. Set in a dimly lit underground chamber with subtle amber and teal lighting creating eerie glows and shadows on the metal. The camera angle should be slightly low, looking upwards to capture the towering maze of pipes above. Accentuate textural details like rivets, steam clouds escaping from joints, and drips of condensation. Include small, mechanical creatures like clockwork spiders scuttling in the background.', '1a4d32ba-4288-46f2-9062-f79b7e02414b', NULL, 19, 'instagram-assistant', NULL, 'Default', 'متوجه منظور شما نشدم. آیا می‌توانید توضیح بیشتری در مورد محتوایی که می‌خواهید برای اینستاگرام ایجاد کنید، ارائه دهید؟ اگر به دنبال ایجاد پستی درباره نصب یا تعمیر لوله‌ها در حمام هستید، لطفاً بیشتر توضیح دهید تا بتوانم بهترین محتوا را برای شما تهیه کنم.', NULL, NULL, NULL, 'persian', 0, 'end', 'end', NULL, '2024-12-21 12:18:37', '2024-12-21 08:49:29'),
(5, 2, 'در حوضه لوله های چند لایه پایپ', 'در-حوضه-لوله-های-چند-لایه-پایپ', 'yes', 'Create an intricate scene of multi-layer pipes in an industrial setting. Use a steampunk style with rich, detailed textures of brass and copper. Pipes should vary in size and form an interconnected network. Incorporate ambient, soft lighting with highlights reflecting off metallic surfaces. The camera angle should be a low, wide-angle shot to enhance the depth and complexity of the pipe network. Color tones should be warm with shades of browns, oranges, and yellows to evoke a feeling of aged metal. Add subtle steam effects for atmosphere.', '017fbb92-b071-4237-baaa-9d6399931f62', NULL, 19, 'instagram-assistant', NULL, 'Default', '🌟 کشفیات جدید در دنیای لوله‌های چندلایه! 🌟\n\n🛠️ لوله‌های چندلایه، انقلابی در صنعت تاسیسات! با مقاومت بالا در برابر حرارت و فشار، این لوله‌ها انتخاب ایده‌آلی برای سیستم‌های گرمایشی و آب‌رسانی هستند. امروز می‌خواهم نکاتی را در مورد نصب و کاربردهای این لوله‌ها با شما به اشتراک بگذارم. 🛠️\n\n🔧 چگونگی نصب لوله‌های چندلایه:\n۱. ابتدا محل نصب را تمیز و آماده سازید.\n۲. لوله‌ها را به اندازه مورد نیاز برش دهید.\n۳. اتصالات مناسب مانند زانویی، سه‌راهی و غیره را انتخاب کنید.\n۴. با استفاده از فیتینگ‌های مخصوص، لوله‌ها را به هم متصل کنید.\n۵. برای اطمینان از عدم نشتی، تمام اتصالات را بازبینی کنید.\n\n📸 عکسی از پروژه نصب لوله چندلایه خود را برای ما ارسال کنید و تجربیاتتان را به اشتراک بگذارید!\n\n🏷️ هشتگ‌ها:\n#لوله_چندلایه #تاسیسات #نوآوری_صنعتی #ساختمان #مهندسی_مکانیک #ایران #سیستم_گرمایشی\n\n🎉 بیایید با استفاده از فناوری‌های نوین، به سوی آینده‌ای بهتر گام برداریم! 🎉', NULL, NULL, NULL, 'persian', 0, 'end', 'end', NULL, '2024-12-21 12:21:25', '2024-12-21 08:52:42'),
(6, 2, 'در مورد شرکت وب کام', 'در-مورد-شرکت-وب-کام', 'yes', 'Please create an image of a futuristic webcom office. Picture a sleek, open-plan space with glowing neon blue and purple lights, and interactive holographic displays floating above minimalist white desks. Include a diverse team of young professionals, one working on a hologram, another discussing while pointing at a floating screen. The lighting should be soft yet crisp, emphasizing a tech-forward, visionary atmosphere. Use a wide-angle camera perspective to capture the bustling, high-tech environment. Aim for a realistic style with sharp, clean lines and reflective surfaces.', '6ddfc4ba-45ed-44a3-a014-9fa1aae5d635', NULL, 19, 'instagram-assistant', NULL, 'Default', '🌐 دنیای دیجیتالی رو با #Webcom دوباره کشف کنید! 🚀\n\n🔹 شرکت Webcom یکی از پیشروهای عرصه تکنولوژی و خدمات وب است که با ارائه راهکارهای نوآورانه، کسب‌وکار شما را به سطح بعدی می‌برد.\n\n💡 بررسی خدمات Webcom:\n1️⃣ طراحی وب سایت: از خلاقیت تیم ما برای خلق وب‌سایت‌هایی خیره‌کننده و کاربرپسند بهره ببرید.\n2️⃣ بازاریابی دیجیتال: با استفاده از استراتژی‌های بهینه‌سازی در موتورهای جستجو و بازاریابی محتوا، مخاطبان بیشتری جذب کنید.\n3️⃣ هاستینگ: با سرورهای پایدار و ایمن، وب‌سایت خود را در دستان مطمئن قرار دهید.\n\n🤩 با ما همراه باشید تا بهترینها را تجربه کنید:\n📸 به اشتراک گذاری تصاویر جذاب از پروژه‌های اخیر و بازخوردهای مثبت مشتریان.\n\n📲 برای اطلاعات بیشتر و مشاوره رایگان، به وب‌سایت ما مراجعه کنید یا با ما تماس بگیرید.\n\n🌟 پیش به سوی موفقیت دیجیتالی با Webcom!\n\n#تکنولوژی #وب_سایت #دیجیتال_مارکتینگ #هاستینگ #اینترنت #وبکام #ایران #کسب_وکار_ایرانی #پیشرفت #موفقیت\n\n👍 لطفاً با لایک کردن، کامنت گذاشتن و شیر کردن این پست، حمایت خود را نشان دهید و دنیای دیجیتال را با دوستانتان به اشتراک بگذارید!', NULL, NULL, NULL, 'persian', 4, 'end', 'end', NULL, '2024-12-21 12:28:53', '2024-12-21 09:00:27'),
(7, 2, 'نقش هوش مصنویی در حوضه هنر', 'نقش-هوش-مصنویی-در-حوضه-هنر', 'yes', 'Create an image depicting a futuristic art studio. In the foreground, a humanoid robot with a sleek, chrome finish, paints on a massive canvas using a delicate brush. The robot\'s eyes emit soft blue light. The background shows abstract digital art displays hovering in the air. The room has a modern, minimalist aesthetic with white walls and LED track lighting providing a bright ambiance. The camera angle is a wide shot allowing full view of the action. Emphasize a color palette of blues, whites, and metallics, highlighting the fusion of technology and creativity in the art.', '15312629-4ce1-456b-8cd2-ceeb6fff57c9', NULL, 19, 'instagram-assistant', NULL, 'Default', '🎨✨ روز به روز شاهد پیشرفت‌های شگفت‌انگیز هوش مصنوعی در عرصه هنر هستیم! AI دنیای هنر را متحول کرده و به خلق آثاری بدیع و نوآورانه کمک می‌کند. امروز می‌خواهیم نگاهی بیندازیم به نقش هوش مصنوعی در این حوزه جذاب. 🖌️🤖\n\n👁️‍🗨️ **آیا می‌دانستید که AI می‌تواند:**\n1. **خلق آثار هنری**: AI با تجزیه و تحلیل داده‌های هنری از دوران‌ها و سبک‌های مختلف، قادر است آثار هنری منحصر به فردی خلق کند که ممکن است حتی از خلاقیت بشر هم فراتر برود.\n2. **تحلیل و داوری هنری**: هوش مصنوعی می‌تواند در تحلیل آثار هنری و درک عمیق‌تر از سبک‌ها و تکنیک‌های هنری به ما کمک کند.\n3. **آموزش هنر**: از طریق پلتفرم‌های آموزشی مبتنی بر AI، هنرجویان می‌توانند تکنیک‌ها و مهارت‌های هنری را به شیوه‌ای نوین و موثر یاد بگیرند.\n\n🎨 **یک مثال جذاب**:\nیکی از پروژه‌های هنری AI، \"پروژه Next Rembrandt\" است که در آن با تحلیل دیتاهای آثار رامبراند، یک نقاشی جدید که به سبک او بوده اما تا به حال وجود نداشته، خلق شد!\n\n📸 بیایید با یک پست اینستاگرامی این تکنولوژی را جشن بگیریم:\n\n[عکسی از یک اثر هنری خلق شده توسط AI]\n\n🌟 **کپشن**: \"در دنیایی که هوش مصنوعی با هنر ترکیب می‌شود، هر نقاشی داستانی جدید برای گفتن دارد. بیایید از این نوآوری‌ها استقبال کنیم و دنیای هنر را بازتعریف کنیم! 🎨🤖\"\n\n🔖 **هشتگ‌ها**:\n#هوش_مصنوعی\n#هنر_مدرن\n#نوآوری_در_هنر\n#AI_در_هنر\n#پروژه_هنری\n#فناوری_و_هنر\n\nبا این پست، هم دانش مخاطبان‌تان را در مورد نقش AI در هنر افزایش دهید و هم به آن‌ها نشان دهید که فناوری چگونه می‌تواند برای خلاقیت و نوآوری', NULL, NULL, NULL, 'persian', 10, 'generate', 'end', NULL, '2024-12-22 06:41:46', '2024-12-23 08:08:07'),
(8, 2, 'کاربرد هوش مصنوعی در حوزه هنر', 'کاربرد-هوش-مصنوعی-در-حوزه-هنر', 'no', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, NULL, '🎨✨ هوش مصنوعی و هنر هم‌کنار! کشف ترکیب بی‌نظیری از تکنولوژی و خلاقیت 🌟\n\n🖼️ در این پست می‌خواهیم نگاهی بیندازیم به نقش هوش مصنوعی در دنیای هنر و چگونه AI داره این عرصه رو متحول می‌کنه. ربات‌ها و برنامه‌های کامپیوتری که می‌تونن آثار هنری خلق کنن، از نقاشی گرفته تا موسیقی، و حتی شعر!\n\n👩‍🎨 ۱. نقاشی: AI می‌تونه با الهام از سبک هنرمندان مشهور نقاشی‌های جدید خلق کنه. فرض کنید یک نقاشی جدید از ون گوگ که هرگز وجود نداشته!\n\n🎵 ۲. موسیقی: هوش مصنوعی می‌تونه ملودی‌هایی بسازه که به احساسات انسانی پیوند بخوره و حتی آلبوم‌های کاملی تولید کنه بدون دخالت مستقیم هنرمندان.\n\n📝 ۳. شعر و نوشتار: AI توانایی ساخت شعر و داستان‌هایی با ساختار و مفهوم معتبر را دارد. تصور کنید شعری به زیبایی آثار حافظ، خلق شده توسط یک برنامه کامپیوتری!\n\n🎭 ۴. تئاتر و سینما: از AI برای نوشتن فیلمنامه‌ها و حتی کارگردانی استفاده می‌شود. تحلیل گسترده داده‌ها به AI اجازه می‌دهد تا داستان‌هایی متناسب با مخاطب ارائه دهد.\n\n🎥 بیا با هم ببینیم که هوش مصنوعی چطور می‌تونه به ما در فهم عمیق‌تر و ارتباط بهتر با هنر کمک کنه. آیا فکر می‌کنید AI می‌تونه واقعاً هنرمند باشه؟ نظراتتون رو کامنت کنید! \n\n🔥👇 نظراتتونو بنویسید و با دیگران به اشتراک بگذارید تا ببینیم چه نگاه‌های مختلفی وجود داره!\n\n#هوش_مصنوعی #هنر #تکنولوژی_و_هنر #نقاشی_AI #موسیقی_مصنوعی #شعر_AI #فیلمنامه_هوشمند #هنرمندان_دیجیتال #ایران #فناوری\n\n🔗 به این پست لایک و فالو بزنید تا از آخرین بحث‌ها و ترندها در', NULL, NULL, NULL, 'persian', 8, 'waiting', 'end', NULL, '2024-12-23 06:02:15', '2024-12-23 02:36:39'),
(9, 9, 'کت شلوار تن یک گربه', 'کت-شلوار-تن-یک-گربه', 'no', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', '🐱✨ برای ساختن یک لباس جذاب برای گربه‌های نازنینتان، دنبال کنید این مراحل ساده را! ✨🐾\n\n### چطور برای گربه خود لباس بدوزیم؟\n\n**مرحله ۱: اندازه‌گیری**\n- ابتدا اندازه‌های گربه خود را بگیرید: دور گردن، دور بدن، و طول از گردن تا دم.\n\n**مرحاله ۲: انتخاب پارچه**\n- پارچه‌ای نرم و راحت مثل پنبه یا فلیس انتخاب کنید تا راحتی گربه‌تان تامین شود.\n\n**مرحله ۳: برش پارچه**\n- بر اساس اندازه‌هایی که گرفتید، الگوی لباس را روی پارچه پیاده و برش دهید.\n\n**مرحله ۴: دوخت**\n- لبه‌های پارچه را به هم دوخته و مطمئن شوید که فضای کافی برای حرکت گربه وجود دارد.\n\n**مرحله ۵: تزئین**\n- برای زیبایی بیشتر، می‌توانید از تزئیناتی مانند کمربند، پاپیون یا دکمه‌های رنگی استفاده کنید.\n\n### کپشن خلاقانه:\n🌟 \"هر پادشاهی به تاجش نیاز دارد و هر گربه‌ای به لباسش! 👑🐱💕 این لباس نازنازی رو ببینید که چقدر بهش میاد! #گربه_مدل\"\n\n### هشتگ‌ها:\n- #گربه_ناز\n- #لباس_گربه\n- #دوستداران_گربه\n- #حیوانات_خانگی\n- #مد_حیوانات\n\nاین پست را با دوستان و دیگر دوستداران حیوانات به اشتراک بگذارید و لذت ببرید از دیدن گربه‌های ناز در لباس‌های شیک و زیبا! 🎉🐱💖', NULL, NULL, NULL, 'persian', 10, 'waiting', 'end', NULL, '2024-12-23 11:32:37', '2024-12-23 08:06:00'),
(10, 9, 'کت شلوار تن یک گربه', 'کت-شلوار-تن-یک-گربه', 'yes', 'Create an image of a cat dressed in an elegant three-piece suit. The suit should be a classic British style, tailored, with a dark navy blue color. The cat, a fluffy ginger Maine Coon, should wear a crisp white shirt and a red silk tie. The background is a Victorian study, with dark wood paneling and shelves full of books. Soft, warm lighting emanates from a vintage brass desk lamp. The camera angle is at eye level with the cat, capturing a dignified, slightly amused expression. Focus on rich textures and a cozy, sophisticated atmosphere.', '5c4de8b7-71c8-49af-83d4-7aa5a66af8df', NULL, 19, 'instagram-assistant', NULL, 'Default', '🌟✨ باز هم یک پست جذاب و دوست‌داشتنی دیگر برای دوست‌داران حیوانات خانگی! 🐾🎩\n\n📸 عکس امروز مربوط به یک پوشش خاص و بامزه برای گربه‌هاست: کت و شلوار گربه‌ای! 😺👔\n\n### توضیحات برای عکس:\n1. **انتخاب لباس**: کت و شلواری مناسب اندازه گربه خود انتخاب کنید. مطمئن شوید که از جنس نرم و راحتی است تا گربه شما احساس ناراحتی نکند.\n2. **پوشاندن لباس**: به آرامی لباس را به گربه خود بپوشانید. از قسمت سر شروع کنید و دقت کنید که گربه احساس راحتی کند.\n3. **تنظیم کردن**: اطمینان حاصل کنید که لباس به خوبی بر روی بدن گربه قرار گرفته و محدودیتی در حرکت ایجاد نمی‌کند.\n4. **عکاسی**: حالا وقت آن رسیده که از گربه خود در این لباس جذاب عکس بگیرید! 📸\n\n### کپشن:\n\"چه کسی گفته فقط انسان‌ها می‌تونن شیک پوش باشن؟ 🎩🐱💼 #گربه_مدل #خوش_تیپی_زیباست\"\n\n### هشتگ‌ها:\n- #گربه_شیک\n- #لباس_گربه\n- #گربه_خوش_تیپ\n- #عکس_حیوانات\n- #حیوانات_خانگی\n- #گربه\n\nاین عکس قطعاً در صفحه اینستاگرام شما می‌درخشد و توجه دوست‌داران گربه‌ها را به خود جلب می‌کند. نظرات و پسندهای زیادی دریافت خواهید کرد! 🌟🐾', NULL, NULL, NULL, 'persian', 6, 'end', 'end', NULL, '2024-12-23 11:36:55', '2024-12-23 08:19:17'),
(11, 9, 'کت شلوار تن یک گربه', 'کت-شلوار-تن-یک-گربه', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 05:55:58', '2024-12-24 05:55:58'),
(12, 9, 'یک دستیار اینستاگرام', 'یک-دستیار-اینستاگرام', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 06:27:54', '2024-12-24 06:27:54'),
(13, 9, 'دستیار اینستاگرام', 'دستیار-اینستاگرام', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 06:30:36', '2024-12-24 06:30:36'),
(14, 9, 'دستیار', 'دستیار', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 06:31:04', '2024-12-24 06:31:04'),
(15, 9, 's', 's', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 06:32:12', '2024-12-24 06:32:12'),
(16, 9, 'سلام', 'سلام', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 06:39:13', '2024-12-24 06:39:13'),
(17, 9, 'گ', 'گ', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 08:01:31', '2024-12-24 08:01:31'),
(18, 9, 'گربه پلنگی', 'گربه-پلنگی', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 08:01:40', '2024-12-24 08:01:40'),
(19, 9, 'یک دستیار هوشمند برای اینستاگرام', 'یک-دستیار-هوشمند-برای-اینستاگرام', 'yes', NULL, NULL, NULL, 19, 'instagram-assistant', NULL, 'Default', NULL, NULL, NULL, NULL, 'persian', 0, 'waiting', 'waiting', NULL, '2024-12-24 11:46:35', '2024-12-24 11:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` text COLLATE utf8mb4_unicode_ci,
  `galleryable_id` int NOT NULL,
  `galleryable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `image_link`, `galleryable_id`, `galleryable_type`, `created_at`, `updated_at`) VALUES
(1, 'images/generated/2/U5T6CiPNrPmue3gaally__a17c923502064b3384c94c04a6df6c59.jpg', 'https://fal.media/files/lion/U5T6CiPNrPmue3gaally__a17c923502064b3384c94c04a6df6c59.jpg', 1, 'App\\Models\\Content', '2024-12-21 07:59:47', '2024-12-21 07:59:47'),
(2, 'images/generated/2/SG9brWTSXIP_5hAXpjIuH_a583a0fc0cc842b8934c72547e20e989.jpg', 'https://fal.media/files/koala/SG9brWTSXIP_5hAXpjIuH_a583a0fc0cc842b8934c72547e20e989.jpg', 2, 'App\\Models\\Content', '2024-12-21 08:24:24', '2024-12-21 08:24:24'),
(3, 'images/generated/2/vBiLaj1PRW-c0zVNZFKo__4d2ea60e0e1e4492a865dc42c9bd9e61.jpg', 'https://fal.media/files/kangaroo/vBiLaj1PRW-c0zVNZFKo__4d2ea60e0e1e4492a865dc42c9bd9e61.jpg', 3, 'App\\Models\\Content', '2024-12-21 08:31:08', '2024-12-21 08:31:08'),
(4, 'images/generated/2/xcjsnDtXYG31B06g3Vinq_a8acdfb7a6d4482a88748801b0fda9a5.jpg', 'https://fal.media/files/penguin/xcjsnDtXYG31B06g3Vinq_a8acdfb7a6d4482a88748801b0fda9a5.jpg', 4, 'App\\Models\\Content', '2024-12-21 08:49:29', '2024-12-21 08:49:29'),
(5, 'images/generated/2/riUsU1Ev3lumK7K2H12PF_03869a1e15c842dfa342c04bfbbcc701.jpg', 'https://fal.media/files/zebra/riUsU1Ev3lumK7K2H12PF_03869a1e15c842dfa342c04bfbbcc701.jpg', 5, 'App\\Models\\Content', '2024-12-21 08:52:42', '2024-12-21 08:52:42'),
(6, 'images/generated/2/9_yRwQKUHMMm2aW6sQMgX_8292b3dbb02f4352ae2960946e0949bf.jpg', 'https://fal.media/files/elephant/9_yRwQKUHMMm2aW6sQMgX_8292b3dbb02f4352ae2960946e0949bf.jpg', 6, 'App\\Models\\Content', '2024-12-21 09:00:27', '2024-12-21 09:00:27'),
(7, 'images/generated/9/opP0v13LCby-_cBhFhEfq_135d88060c8e4759a2faaa80f1f081bc.jpg', 'https://fal.media/files/rabbit/opP0v13LCby-_cBhFhEfq_135d88060c8e4759a2faaa80f1f081bc.jpg', 10, 'App\\Models\\Content', '2024-12-23 08:19:17', '2024-12-23 08:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(35, 'generate_content', '{\"uuid\":\"96c9b300-625a-40f9-a5d7-26c8d26dcc0c\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735019758, 1735019758),
(36, 'generate_content', '{\"uuid\":\"9d166ab0-d544-436f-b643-046cf8572508\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735021674, 1735021674),
(37, 'generate_content', '{\"uuid\":\"2d902c77-e314-46cf-ac80-7cdbacec9262\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735021836, 1735021836),
(38, 'generate_content', '{\"uuid\":\"1add3ad2-4b8e-46cc-ba24-691973f752e4\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735021864, 1735021864),
(39, 'generate_content', '{\"uuid\":\"098a0eb7-3c56-4df4-b005-b86083fd9851\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735021932, 1735021932),
(40, 'generate_content', '{\"uuid\":\"e5b930e5-4cf9-451d-9327-6c1adb29bd2b\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735022353, 1735022353),
(41, 'generate_content', '{\"uuid\":\"76a3a938-23a9-4d79-8265-098e33dbdb8e\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735027291, 1735027291),
(42, 'generate_content', '{\"uuid\":\"680187ab-88bf-41e0-8f0b-78f3bda93d15\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735027300, 1735027300),
(43, 'generate_content', '{\"uuid\":\"7eaa2279-8718-4884-baef-f2cde6181a8e\",\"displayName\":\"App\\\\Jobs\\\\GenerateContent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":10,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateContent\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\GenerateContent\\\":3:{s:9:\\\"openAiApi\\\";s:164:\\\"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\\\";s:8:\\\"falAiApi\\\";s:69:\\\"6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f\\\";s:5:\\\"queue\\\";s:16:\\\"generate_content\\\";}\"}}', 0, NULL, 1735040795, 1735040795);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_09_28_105405_create_categories_table', 1),
(13, '2022_09_29_104135_create_services_table', 1),
(14, '2022_09_29_110444_create_service_images_table', 1),
(15, '2022_10_18_121106_create_banners_table', 2),
(16, '2022_10_22_051717_create_blogs_table', 3),
(17, '2022_11_07_073848_create_promocodes_table', 4),
(18, '2022_11_11_050805_create_bookings_table', 5),
(19, '2022_12_06_054503_create_contacts_table', 6),
(20, '2023_01_03_105722_create_customdomains_table', 7),
(21, '2024_12_19_044039_crate_galleries_table', 8),
(22, '2019_08_19_000000_create_failed_jobs_table', 9),
(23, '2020_04_13_175041_create_jobs_table', 10),
(24, '2022_01_10_094503_create_apikeys_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `environment` enum('sandbox','normal') NOT NULL DEFAULT 'normal',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `payment_name` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `public_key` text,
  `secret_key` text,
  `encryption_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `account_holder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `is_available` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `vendor_id`, `environment`, `title`, `payment_name`, `image`, `currency`, `public_key`, `secret_key`, `encryption_key`, `bank_name`, `account_holder_name`, `account_number`, `bank_ifsc_code`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 1, 'normal', 'زرین پال', 'ZarinPal', 'zarinpal.png', 'ee', 'f35a6299-94a1-401b-a6f0-000f34e3562b', 'APP_USR-3693146734015792-042811-c6deca56df8ac66e83efb5334c46110c-126508225', '', 'AxciteBank', 'Lorem Ipsum', '55454587713241', '123456', 1, '2020-12-29 02:15:15', '2024-12-23 07:40:24'),
(2, 1, 'sandbox', 'کارت به کارت', 'BankTransfer', 'bank.png', NULL, NULL, NULL, '', 'بانک سامان', 'مهدی یوسفی', '5545-4587-7132-4512', NULL, 1, '2020-12-28 20:45:15', '2023-08-13 12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'auth_token', '3bb4bd52f0e6c5d3b448d3367865d2bb09e8cf2d2041ae46cbc31a6d69fb3cd8', '[\"*\"]', NULL, NULL, '2024-12-22 04:24:48', '2024-12-22 04:24:48'),
(2, 'App\\Models\\User', 2, 'auth_token', '6f91dd8b21cd84bff7dffc62b54da25e1b915dd2e26d37c81f7dcd48ae6f78de', '[\"*\"]', NULL, NULL, '2024-12-22 04:25:45', '2024-12-22 04:25:45'),
(3, 'App\\Models\\User', 2, 'auth_token', '37a9a2d4d38d510a3a97395e8b530741bc23ebd5ec1e9ce11e43c345025cff83', '[\"*\"]', NULL, NULL, '2024-12-22 04:26:09', '2024-12-22 04:26:09'),
(4, 'App\\Models\\User', 2, 'auth_token', '75995d2b0f6d1eaf89eeb862883d20bd6bec99b892d26a2ff6669beb83d89353', '[\"*\"]', NULL, NULL, '2024-12-22 04:26:43', '2024-12-22 04:26:43'),
(5, 'App\\Models\\User', 2, 'auth_token', '35627f7280bba7965deae6c1bf2a0fcef350afa91f518b3de4ab2c6dae5b1806', '[\"*\"]', NULL, NULL, '2024-12-22 04:27:46', '2024-12-22 04:27:46'),
(6, 'App\\Models\\User', 2, 'auth_token', '3bc526c380dccc67197a4a190f6f0f0855fc83231cfbed1b9df7f370c5a358e8', '[\"*\"]', NULL, NULL, '2024-12-22 04:27:47', '2024-12-22 04:27:47'),
(7, 'App\\Models\\User', 2, 'auth_token', '7bebac20d03e8da53fffa7adda4f42bbb0fb6e00f774c5e4e3f3d9bcaa9d19c9', '[\"*\"]', NULL, NULL, '2024-12-22 04:27:57', '2024-12-22 04:27:57'),
(8, 'App\\Models\\User', 2, 'auth_token', '4b53fb7202504c8fcf88d540f23e18d08c8f40e4a732a95ec5f882043051c2db', '[\"*\"]', NULL, NULL, '2024-12-22 04:28:27', '2024-12-22 04:28:27'),
(9, 'App\\Models\\User', 2, 'auth_token', '79607bc431313aeab43a199727c831a7aabbaeef696896667888cd6d9892a733', '[\"*\"]', NULL, NULL, '2024-12-22 04:28:50', '2024-12-22 04:28:50'),
(11, 'App\\Models\\User', 2, 'auth_token', '04c22eaf09d8642fcfc8f0e384c8be5610177ff90af4c44afbd829a9e6a7a61f', '[\"*\"]', '2024-12-24 00:37:20', NULL, '2024-12-23 01:08:35', '2024-12-24 00:37:20'),
(12, 'App\\Models\\User', 7, 'auth_token', '936f4c8e4f83603396b8733bd4a5e0df09eedeef6db6540e17898fa2ddf861e4', '[\"*\"]', '2024-12-23 04:57:38', NULL, '2024-12-23 04:23:27', '2024-12-23 04:57:38'),
(13, 'App\\Models\\User', 9, 'auth_token', '6f242f9a34a8edf75a8199335286438325d1f19efb051bbdb9bdb3f5c35f7341', '[\"*\"]', '2024-12-23 07:54:58', NULL, '2024-12-23 06:19:35', '2024-12-23 07:54:58'),
(14, 'App\\Models\\User', 9, 'auth_token', '9a143215fd6f927266686e9e2152b5674eeb14e8d15494748d6e0be2c1e314e0', '[\"*\"]', NULL, NULL, '2024-12-23 07:11:00', '2024-12-23 07:11:00'),
(15, 'App\\Models\\User', 9, 'auth_token', '2faddb2b2583c33f75fa3c80f8820a1e3476d207edc2cb2e7c08c3f98b2e8da7', '[\"*\"]', NULL, NULL, '2024-12-23 07:24:05', '2024-12-23 07:24:05'),
(16, 'App\\Models\\User', 9, 'auth_token', '4ceaacdd656466c9c51dd8918569d780fdfecd54c69b7fb40d4ac9659d911c1e', '[\"*\"]', NULL, NULL, '2024-12-23 07:24:41', '2024-12-23 07:24:41'),
(17, 'App\\Models\\User', 9, 'auth_token', '63788d6b866b8a61532483878ba282c1fe5e4f5b679480b90dd354737fda2267', '[\"*\"]', NULL, NULL, '2024-12-23 07:25:24', '2024-12-23 07:25:24'),
(18, 'App\\Models\\User', 9, 'auth_token', '0c1bb31e1c6d74d1ed1999c3ae8fbc9329eba064ace079749015638907e20d93', '[\"*\"]', NULL, NULL, '2024-12-23 07:26:20', '2024-12-23 07:26:20'),
(19, 'App\\Models\\User', 9, 'auth_token', '8e688aa0663e0e3181fbbf960273e359ca72ef80e04c612b465bcb7f45398cfa', '[\"*\"]', NULL, NULL, '2024-12-23 07:26:50', '2024-12-23 07:26:50'),
(20, 'App\\Models\\User', 9, 'auth_token', '80f10cae0691bed4d115e5ad34c4fddae6db39d1f240a6e089cebb5772846d83', '[\"*\"]', '2024-12-24 02:25:58', NULL, '2024-12-23 07:47:14', '2024-12-24 02:25:58'),
(21, 'App\\Models\\User', 9, 'auth_token', 'c4782b0cfb0a07b1d95350192021eddbbfa1fe4f37e589f6548756c547265f97', '[\"*\"]', NULL, NULL, '2024-12-23 08:46:34', '2024-12-23 08:46:34'),
(22, 'App\\Models\\User', 9, 'auth_token', 'd5b0e5bafcda8b743c6030376e1b39519f23a4c8c28b496157b51289c8f04f10', '[\"*\"]', NULL, NULL, '2024-12-23 08:47:02', '2024-12-23 08:47:02'),
(23, 'App\\Models\\User', 9, 'auth_token', '1cd87e86c0956ef2dc1858b373fc7a7ae7030942eda8139876b3966e1374dfb3', '[\"*\"]', '2024-12-23 08:53:37', NULL, '2024-12-23 08:48:55', '2024-12-23 08:53:37'),
(24, 'App\\Models\\User', 9, 'auth_token', 'c774e32b465612ea542c658636d8ffe2d136172184b077a869f22f394a424ff4', '[\"*\"]', '2024-12-24 00:37:53', NULL, '2024-12-24 00:23:51', '2024-12-24 00:37:53'),
(25, 'App\\Models\\User', 9, 'auth_token', '16274182b79f67fa44b57ccb1c71501b87f67c4ed19166bd115afc49205b1838', '[\"*\"]', '2024-12-24 00:26:13', NULL, '2024-12-24 00:25:51', '2024-12-24 00:26:13'),
(26, 'App\\Models\\User', 9, 'auth_token', 'c899605271b0fbc433032c378b4c1a58fc33270711d8f18d7ee079496a23a78f', '[\"*\"]', '2024-12-24 00:37:51', NULL, '2024-12-24 00:37:50', '2024-12-24 00:37:51'),
(27, 'App\\Models\\User', 9, 'auth_token', '57960aa0a3d6a1dfb90169579d27d919055ce3cb76ffb296a22ade2bfc2809ed', '[\"*\"]', '2024-12-24 00:52:01', NULL, '2024-12-24 00:52:00', '2024-12-24 00:52:01'),
(28, 'App\\Models\\User', 9, 'auth_token', 'e89e02793ed385586b7f7aedef5efc9b5d0b60dce228240b1262106b361b87a7', '[\"*\"]', '2024-12-24 01:08:25', NULL, '2024-12-24 01:03:53', '2024-12-24 01:08:25'),
(29, 'App\\Models\\User', 9, 'auth_token', '2ea177eab8424590ca7ea951b3653313870bf15ae30e7c6a58fa37ecd7b67cc5', '[\"*\"]', '2024-12-24 01:14:04', NULL, '2024-12-24 01:09:54', '2024-12-24 01:14:04'),
(30, 'App\\Models\\User', 9, 'auth_token', 'e613e5a12d1fe6d520d70cdabdd95fcd63241568ed0189031b47c4bba2cb506b', '[\"*\"]', '2024-12-24 01:19:14', NULL, '2024-12-24 01:16:32', '2024-12-24 01:19:14'),
(31, 'App\\Models\\User', 9, 'auth_token', '845d0c10ebb12249c7f267447ad80bb013e7cfb59e6e8d5adc819013afefaa6a', '[\"*\"]', '2024-12-24 01:26:24', NULL, '2024-12-24 01:23:04', '2024-12-24 01:26:24'),
(32, 'App\\Models\\User', 9, 'auth_token', 'b3ab5be86f4e7149a12403939c8b48eff2ab4af063102285813c90684324e6d2', '[\"*\"]', '2024-12-24 02:09:57', NULL, '2024-12-24 01:29:20', '2024-12-24 02:09:57'),
(33, 'App\\Models\\User', 9, 'auth_token', '2b3d7d054edd21089dc6f4dfc6a68c17b074d5a64435912803f236f5f404c486', '[\"*\"]', '2024-12-24 01:44:36', NULL, '2024-12-24 01:40:16', '2024-12-24 01:44:36'),
(34, 'App\\Models\\User', 9, 'auth_token', 'ed3a77b69c3470d432abb324627e4e705d16ea8821844b9ababc0fc114bf725a', '[\"*\"]', '2024-12-24 01:50:04', NULL, '2024-12-24 01:45:35', '2024-12-24 01:50:04'),
(35, 'App\\Models\\User', 9, 'auth_token', '8d9b62b6eb414eb90d5d639b92f18ebdb0750e361529b95165d65492013bdc4f', '[\"*\"]', '2024-12-24 02:00:30', NULL, '2024-12-24 01:59:57', '2024-12-24 02:00:30'),
(36, 'App\\Models\\User', 9, 'auth_token', 'f3835931fe6c820e2ce3e3d125e8a35fd20f2ac69b91a6217af76b7840be779a', '[\"*\"]', '2024-12-24 02:10:54', NULL, '2024-12-24 02:10:20', '2024-12-24 02:10:54'),
(37, 'App\\Models\\User', 9, 'auth_token', '74fdec6e4160e98dc2f01a904731a142cc11f0d71908a5877c877f38678a4c3b', '[\"*\"]', '2024-12-24 02:24:14', NULL, '2024-12-24 02:20:56', '2024-12-24 02:24:14'),
(38, 'App\\Models\\User', 9, 'auth_token', '9400517a58418425a485ef09e21e8f32d3372f316a7002a5836c5c7ec37a9bc5', '[\"*\"]', '2024-12-24 02:40:18', NULL, '2024-12-24 02:35:58', '2024-12-24 02:40:18'),
(39, 'App\\Models\\User', 9, 'auth_token', '323cca68b08f3c32c72db2419964ad02444373b5bae7b354498aea093dcfd82b', '[\"*\"]', '2024-12-24 02:45:25', NULL, '2024-12-24 02:42:48', '2024-12-24 02:45:25'),
(40, 'App\\Models\\User', 9, 'auth_token', 'cb1e7b9fb007395c8fd4ab7bd4545d05ba806108ca81214b53da37e6c585c470', '[\"*\"]', '2024-12-24 02:57:54', NULL, '2024-12-24 02:54:42', '2024-12-24 02:57:54'),
(41, 'App\\Models\\User', 9, 'auth_token', '105c5417b0958d4dfbfadf1fec96a2eac6fd9e9930f5dd549b4176b52464593b', '[\"*\"]', '2024-12-24 03:05:20', NULL, '2024-12-24 03:00:21', '2024-12-24 03:05:20'),
(42, 'App\\Models\\User', 9, 'auth_token', '7135130292ac8c5586de14694d0a0f17b320ab53916cc0147a8ae523eb99e080', '[\"*\"]', '2024-12-24 03:11:05', NULL, '2024-12-24 03:06:06', '2024-12-24 03:11:05'),
(43, 'App\\Models\\User', 9, 'auth_token', 'f39860cec9cc4260194bbb289070846b7ef08fe62fab2208305d12576fd81d61', '[\"*\"]', '2024-12-24 03:11:58', NULL, '2024-12-24 03:11:54', '2024-12-24 03:11:58'),
(44, 'App\\Models\\User', 9, 'auth_token', '283644b4fcb44f6f78c5b1fca5517e5701adab2a9067297d7ae8b5cee98ebb07', '[\"*\"]', '2024-12-24 03:22:54', NULL, '2024-12-24 03:18:18', '2024-12-24 03:22:54'),
(45, 'App\\Models\\User', 9, 'auth_token', 'ba58b81668c5022279427fbb2341412b67d6f22a9e64ed44039bf10440d006de', '[\"*\"]', '2024-12-24 03:32:27', NULL, '2024-12-24 03:27:45', '2024-12-24 03:32:27'),
(46, 'App\\Models\\User', 9, 'auth_token', 'a6793102fa82f0cbb3729f09e703aacab99dd2fadc76c447275e7d5258768c34', '[\"*\"]', '2024-12-24 03:41:54', NULL, '2024-12-24 03:38:01', '2024-12-24 03:41:54'),
(47, 'App\\Models\\User', 9, 'auth_token', 'b3cb52e44bbed0f2f5a67806e8551390a3186ab2a5723070906c0ead6322f29c', '[\"*\"]', '2024-12-24 03:54:57', NULL, '2024-12-24 03:50:32', '2024-12-24 03:54:57'),
(48, 'App\\Models\\User', 9, 'auth_token', 'a262f38409852b551a25bc432e89d080601377102d9ca51da9bb5e931b4359ca', '[\"*\"]', '2024-12-24 04:00:02', NULL, '2024-12-24 03:58:45', '2024-12-24 04:00:02'),
(49, 'App\\Models\\User', 9, 'auth_token', '3b6a1bfb4af46b03596047454bb5d8f4a4a5e1704a289c99740687f58fb6193a', '[\"*\"]', '2024-12-24 04:17:20', NULL, '2024-12-24 04:13:27', '2024-12-24 04:17:20'),
(50, 'App\\Models\\User', 9, 'auth_token', 'eb4dbad08d44abff5225aaa220ac7c8364ed7a5d2f4df6130fdeee27779d5b0f', '[\"*\"]', '2024-12-24 04:22:45', NULL, '2024-12-24 04:19:24', '2024-12-24 04:22:45'),
(51, 'App\\Models\\User', 9, 'auth_token', 'daabd0b5a6f7d215cb01bd901d21ebd85d44456224f7f55c46189bd49928cd96', '[\"*\"]', '2024-12-24 04:36:11', NULL, '2024-12-24 04:31:11', '2024-12-24 04:36:11'),
(52, 'App\\Models\\User', 9, 'auth_token', '3ea221060938b2064d69e7316d440b9632b126d9ddecae25c4f2d8a11da66a7e', '[\"*\"]', '2024-12-24 04:43:07', NULL, '2024-12-24 04:39:05', '2024-12-24 04:43:07'),
(53, 'App\\Models\\User', 9, 'auth_token', 'ce4ac63d29efd9555bb38e6f860304aece59c9794bc9b227dc5d27cd7ad4f884', '[\"*\"]', '2024-12-24 05:41:15', NULL, '2024-12-24 05:39:47', '2024-12-24 05:41:15'),
(54, 'App\\Models\\User', 9, 'auth_token', '614c6edb984755ff5aa177a0f36d1f4e967dce926f6c74566dc666a56c12cce2', '[\"*\"]', '2024-12-24 06:03:48', NULL, '2024-12-24 05:59:05', '2024-12-24 06:03:48'),
(55, 'App\\Models\\User', 9, 'auth_token', '25c5b61e8828b8fc2a922d2ed82e991959147a1305cfb46db2957fb4ecd844cf', '[\"*\"]', '2024-12-24 06:13:32', NULL, '2024-12-24 06:08:35', '2024-12-24 06:13:32'),
(56, 'App\\Models\\User', 9, 'auth_token', '38bcec2c4a2073375819c1ac8ac20ba3f26695dabe358722df4e60ff39ae706b', '[\"*\"]', '2024-12-24 06:36:24', NULL, '2024-12-24 06:36:24', '2024-12-24 06:36:24'),
(57, 'App\\Models\\User', 9, 'auth_token', '17914715234dde69f268dfdb521929c26b9750cfc4a6a4889cc58c836386e18c', '[\"*\"]', '2024-12-24 06:47:26', NULL, '2024-12-24 06:42:26', '2024-12-24 06:47:26'),
(58, 'App\\Models\\User', 9, 'auth_token', 'f3658f5e2e61418155f98242dff11069fa7bd29c829bc4cdf7a1074ddbdf60d9', '[\"*\"]', '2024-12-24 06:52:46', NULL, '2024-12-24 06:47:53', '2024-12-24 06:52:46'),
(59, 'App\\Models\\User', 9, 'auth_token', '48cf67ea6946ee48a440b2ce476dee7b2e782955094ca9dbb5b0ea7121b3aa8c', '[\"*\"]', '2024-12-24 07:05:16', NULL, '2024-12-24 07:00:24', '2024-12-24 07:05:16'),
(60, 'App\\Models\\User', 9, 'auth_token', '560eb43a4b42c13d9ed9e4b16def0cdb281c034c2c0f3c9c3211a6a33a24e5f0', '[\"*\"]', '2024-12-24 07:05:54', NULL, '2024-12-24 07:05:51', '2024-12-24 07:05:54'),
(61, 'App\\Models\\User', 9, 'auth_token', '6b6091cbaccf88bef53b188fe7821faa1be2a3007882f4b0290204f934141ea2', '[\"*\"]', '2024-12-24 07:17:17', NULL, '2024-12-24 07:12:26', '2024-12-24 07:17:17'),
(62, 'App\\Models\\User', 9, 'auth_token', 'c5d55c46b42b19b1d2ec671d01e57c878fb75d7c5ac59c45ee6510827860d5ec', '[\"*\"]', '2024-12-24 07:24:15', NULL, '2024-12-24 07:19:17', '2024-12-24 07:24:15'),
(63, 'App\\Models\\User', 9, 'auth_token', 'c49724efc0e953f0c557834a462cdef896ef652d4d082694698869f899e34fd8', '[\"*\"]', '2024-12-24 07:31:13', NULL, '2024-12-24 07:31:10', '2024-12-24 07:31:13'),
(64, 'App\\Models\\User', 9, 'auth_token', 'c90519a2fbd7837be906ff38a6731823b655a52587b73021864c9ca50c39aa41', '[\"*\"]', '2024-12-24 07:43:05', NULL, '2024-12-24 07:38:56', '2024-12-24 07:43:05'),
(65, 'App\\Models\\User', 9, 'auth_token', 'f3cb12e6573d0c2c9b2d84270523f492b8c8e38037202584c6b3d2e1bbacdae8', '[\"*\"]', '2024-12-24 07:48:16', NULL, '2024-12-24 07:43:22', '2024-12-24 07:48:16'),
(66, 'App\\Models\\User', 9, 'auth_token', 'bd143b511bb2b5beb76072ec58e34b86680d523c72a632f1ddc35e37fab104fa', '[\"*\"]', '2024-12-24 08:00:11', NULL, '2024-12-24 07:54:24', '2024-12-24 08:00:11'),
(67, 'App\\Models\\User', 9, 'auth_token', '3bc37cf6e9eafc0a8d6da3119fcb24e544397f10340ab5acf762173d736e5eb5', '[\"*\"]', '2024-12-24 08:15:22', NULL, '2024-12-24 08:14:22', '2024-12-24 08:15:22'),
(68, 'App\\Models\\User', 9, 'auth_token', '4b7bc00b9ed31be268fd310ece5e96fe2d387a0578200c8148f9f0fac9654aa9', '[\"*\"]', '2024-12-24 08:18:05', NULL, '2024-12-24 08:15:32', '2024-12-24 08:18:05'),
(69, 'App\\Models\\User', 9, 'auth_token', '50d9778648c8aaa75e6e4293589d8c2b472cafa5d8ef832a34682a133f66b4fc', '[\"*\"]', '2024-12-24 08:22:50', NULL, '2024-12-24 08:22:49', '2024-12-24 08:22:50'),
(70, 'App\\Models\\User', 9, 'auth_token', '30b95267edf59a566a77e0e0e14f02062bbdfeaa1ed255614a1900b2722c4c92', '[\"*\"]', '2024-12-24 08:29:05', NULL, '2024-12-24 08:24:41', '2024-12-24 08:29:05'),
(71, 'App\\Models\\User', 9, 'auth_token', 'c1bf0ad86954838f722b9889faf2ae59f3bb1f34b16df4a50b2a6ec72c8a7cee', '[\"*\"]', '2024-12-24 08:36:09', NULL, '2024-12-24 08:31:13', '2024-12-24 08:36:09'),
(72, 'App\\Models\\User', 9, 'auth_token', '3172e04028cba83327483eb0c718dec8219c11f4992d8f6a2b39cab608e98f20', '[\"*\"]', '2024-12-24 08:41:15', NULL, '2024-12-24 08:37:25', '2024-12-24 08:41:15'),
(73, 'App\\Models\\User', 9, 'auth_token', '1970debb17f96cb725d8f499ef2c5fd894a3c694c5c2da304942ba7597c40149', '[\"*\"]', '2024-12-24 08:48:01', NULL, '2024-12-24 08:43:17', '2024-12-24 08:48:01'),
(74, 'App\\Models\\User', 9, 'auth_token', '1b3fe7c61e2b06458db0a8d9d81b2e15c0e94b7d8fa02c2e6bf5a362ca7a207d', '[\"*\"]', '2024-12-24 08:50:09', NULL, '2024-12-24 08:50:07', '2024-12-24 08:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` longtext,
  `features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `themes_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` int NOT NULL COMMENT '1=fixed,2=custom',
  `duration` varchar(255) DEFAULT NULL COMMENT '1=1 month\r\n2=3 month\r\n3=6 month\r\n4=1 year\r\n5=lifetime\r\n\r\n\r\n\r\n',
  `days` int DEFAULT NULL,
  `word_limit` int NOT NULL,
  `tools_limit` varchar(255) DEFAULT NULL,
  `is_available` int DEFAULT '1' COMMENT '1=Yes\r\n2=No\r\n',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `features`, `price`, `themes_id`, `plan_type`, `duration`, `days`, `word_limit`, `tools_limit`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'پلن اول', NULL, 'ایده ها و طرح کلی وبلاگ|نوشتن بخش وبلاگ', 0, '0', 1, '1', 0, 1000, '1,2,19', 1, '2023-08-11 14:58:03', '2024-12-23 06:29:44'),
(2, 'پلن دوم', NULL, 'همه ابزار های پلن اول|ایده های کسب و کار|جلد نامه|پست رسانه های اجتماعی (تجارت)', 39000, '0', 1, '1', 0, 1000, '1,2,3,4,5', 1, '2023-08-11 16:10:29', '2023-08-29 07:47:16'),
(3, 'پلن سوم', NULL, 'همه ابزار های پلن دوم|توضیحات تبلیغات گوگل|پست رسانه های اجتماعی (شخصی)|توضیحات محصول|توضیحات متا|عناوین متا|توضیحات ویدئو', 56000, '0', 1, '1', 0, 1000, '1,2,3,4,5,6,7,8,9,10,11', 1, '2023-08-12 15:18:48', '2023-08-29 07:47:02'),
(4, 'پلن چهارم', NULL, 'همه ابزار های پلن سوم|توضیحات ویدئو|محتوای فرم طولانی|پاسخ واقعی|سوالات مصاحبه|بررسی سازنده|تصاویر AI|طرح کلی وبلاگ پیشرفته', 79000, '0', 1, '1', 0, 1000, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1, '2023-08-12 15:24:21', '2023-08-29 07:48:53'),
(5, 'دستیار اینستاگرام', 'دستیار اینستاگرام', 'افزودن پست', 1000, '0', 1, '1', 0, 10000, '19', 1, '2024-12-08 03:34:00', '2024-12-09 01:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INR',
  `currency_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=left, 2=right',
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default-logo.png',
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-favicon.png',
  `home_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delivery_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Asia/Kolkata',
  `referral_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wait_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Copyright © 2021-2022',
  `web_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `web_layout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=LTR, 2=RTL',
  `primary_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#fffff',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_widget` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `terms_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `privacy_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=Yes,2=No',
  `tracking_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aiApiKey` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `imageAiApiKey` text COLLATE utf8mb4_unicode_ci,
  `SMS_PANEL_USERNAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMS_PANEL_PASSWORD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SMS_PANEL_FROM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ippanel_send_code_pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vendor_id`, `currency`, `currency_position`, `logo`, `favicon`, `home_banner`, `footer_description`, `delivery_type`, `timezone`, `referral_amount`, `wait_time`, `address`, `email`, `description`, `contact`, `copyright`, `web_title`, `web_layout`, `primary_color`, `meta_title`, `meta_description`, `og_image`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `whatsapp_widget`, `terms_content`, `privacy_content`, `about_content`, `maintenance_mode`, `tracking_id`, `view_id`, `aiApiKey`, `imageAiApiKey`, `SMS_PANEL_USERNAME`, `SMS_PANEL_PASSWORD`, `SMS_PANEL_FROM`, `ippanel_send_code_pattern`, `file_name_update`, `created_at`, `updated_at`) VALUES
(1, 1, 'تومان', '2', 'logo-63ee34e1cd1bd.png', 'favicon-1234.png', 'homebanner.png\r\n', '', NULL, 'Asia/Tehran', NULL, NULL, NULL, NULL, NULL, NULL, 'Copyright © 2023 weblak.ir', 'WebLak', '', '', 'AI Writer SaaS - Powerful Automatic Content Generator Tools & Writing Assistant', 'AI Writer is a software-as-a-service (SaaS) platform that uses artificial intelligence to automatically generate written content. It is designed to help users save time and increase their productivity by generating high-quality, unique content in a matter of seconds. The AI engine is trained on a large corpus of text and uses machine learning algorithms to generate content that is coherent, grammatically correct, and semantically meaningful. One of the key features of AI Writer is its writing assistant capabilities. The platform offers suggestions and recommendations on grammar, style, and tone, making it easier for users to fine-tune their content and ensure that it meets their specific needs. AI Writer is a powerful tool for businesses, content creators, and marketers who need to generate large amounts of written content quickly and efficiently. With its ability to generate articles, blog posts, product descriptions, and other types of content, AI Writer can help users save time and resources, while still delivering high-quality, engaging content that their audience will love. Overall, AI Writer is an innovative and effective solution for anyone looking to streamline their content creation process and produce high-quality written content with ease.', 'og_image-63e9ce947ae99.png', NULL, NULL, NULL, NULL, NULL, '<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>', '<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Suspendisse dolor diam</strong>, pharetra quis porta quis, scelerisque nec ipsum. Sed suscipit condimentum arcu et lobortis. Donec quis magna nec mi sagittis efficitur eget vel mauris. Phasellus sed euismod lectus, nec volutpat est. Donec semper nec massa nec blandit. In consequat lacus nec libero varius, eget tempor tellus pulvinar. In quis facilisis elit. Nulla mollis, elit et tincidunt volutpat, metus nunc aliquet magna, at porta nisl dui sed metus. Proin eu sodales erat. Curabitur nec consectetur nisl. Aliquam tempor ligula nec orci pharetra, at egestas dolor facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas molestie rutrum lectus non malesuada. Donec sit amet urna a enim hendrerit laoreet. Vivamus ac odio fringilla, rutrum lacus at, vestibulum orci.</p>', '<p><strong>It is a long established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>It is a long established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>It is a long established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>It is a long established</strong> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, NULL, NULL, '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', '6b9f9a07-e9e0-4cc7-b864-2f8b672e8229:bdecd48b93db1363ff673820e029a96f', 'webcomnaghilo', 'webcomco1403', '983000505', 'zj9xvrhyabn5vnx', 'webapp-v1.0.0.zip', '2022-12-02 10:09:25', '2024-12-21 08:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `systemaddons`
--

CREATE TABLE `systemaddons` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(20) NOT NULL,
  `activated` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`, `slug`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ایده ها و طرح کلی وبلاگ', 'content-writer', 'باهوش ترین بازنویسنده محتوا مقالات وبلاگ یا هر نوع محتوا را در چند ثانیه بازنویسی کنید.', 1, '2023-02-09 10:23:19', '2024-12-08 06:58:49'),
(2, 'نوشتن بخش وبلاگ', 'artical-generator', 'با این ویرایشگر هوش مصنوعی، عنوان و طرح کلی را به یک مقاله کاملاً بهینه شده و طولانی از نظر سئو تبدیل کنید.', 1, '2023-02-09 10:25:29', '2024-12-08 06:58:49'),
(3, 'ایده های کسب و کار', 'business-idea', 'ابزار عالی برای ایجاد ایده های خلاقانه برای کسب و کارهای بعدی شما', 1, '2023-02-09 10:26:38', '2024-12-08 06:58:49'),
(4, 'جلد نامه', 'cover-latter', 'شرح شغلی حرفه ای بنویسید که به شما در جذب استعدادهای برتر کمک می کند.', 1, '2023-02-09 10:27:41', '2024-12-08 06:58:49'),
(5, 'پست رسانه های اجتماعی (تجارت)', 'social-post-business', 'یک پست برای کسب و کار خود بنویسید تا در هر پلتفرم رسانه اجتماعی منتشر شود.', 1, '2023-02-09 10:28:20', '2024-12-08 06:58:49'),
(6, 'توضیحات تبلیغات گوگل', 'google-ads', 'توضیحی در گوگل ادز بنویسید که تبلیغ شما را متمایز کند و منجر به تولید شود.', 1, '2023-02-09 10:28:51', '2024-12-08 06:58:49'),
(7, 'پست رسانه های اجتماعی (شخصی)', 'social-post-personal', 'یک پست رسانه اجتماعی برای خود بنویسید تا در هر پلتفرمی منتشر شود.', 1, '2023-02-09 10:29:31', '2024-12-08 06:58:49'),
(8, 'توضیحات محصول', 'product-description', 'توضیحاتی را در مورد محصول خود بنویسید و اینکه چرا ارزش خرید دارد.', 1, '2023-02-09 10:30:04', '2024-12-08 06:58:49'),
(9, 'توضیحات متا', 'meta-description', 'توضیحات متا بهینه شده برای سئو را بر اساس توضیحات بنویسید.', 1, '2023-02-09 10:30:36', '2024-12-08 06:58:49'),
(10, 'عناوین متا', 'meta-title', 'یک کلمه کلیدی برای تولید عناوین متا بهینه شده برای سئو، با تضمین CTR بالاتر وارد کنید', 1, '2023-02-09 10:31:06', '2024-12-08 06:58:49'),
(11, 'توضیحات ویدئو', 'video-description', 'توضیحات قانع کننده YouTube را بنویسید تا مردم را به ویدیوی خود علاقه مند کنید.', 1, '2023-02-09 10:31:31', '2024-12-08 06:58:49'),
(12, 'ایده های ویدیویی', 'video-idea', 'ابزار عالی برای ایجاد ایده های خلاقانه برای ویدیوهای بعدی شما', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(13, 'محتوای فرم طولانی', 'long-form', 'نویسنده محتوا قدرتمند همیشه. هر نوع محتوای طولانی را در چند ثانیه بنویسید', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(14, 'پاسخ واقعی', 'factual-answer', 'بهترین ابزار پاسخگویی هر سوالی بپرسید و خیلی سریع جواب بگیرید', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(15, 'سوالات مصاحبه', 'interview-questions', 'در عرض چند لحظه فهرستی از سوالات مصاحبه را بر اساس موضوع خود ایجاد کنید', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(16, 'بررسی سازنده', 'review-creator', 'یک بررسی دقیق برای هر محصول یا خدماتی بر اساس تجربه خود ایجاد کنید', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(17, 'تصاویر AI', 'ai-images', 'با استفاده از این ابزار قدرتمند هوش مصنوعی بر اساس نیاز خود چندین تصویر ایجاد کنید', 1, '2023-02-09 10:32:07', '2024-12-08 06:58:49'),
(18, 'نوشتن وبلاگ پیشرفته', 'artical-generator-pro', 'با این ویرایشگر هوش مصنوعی، عنوان و طرح کلی را به یک مقاله کاملاً بهینه شده و دارای تگ های متا و طولانی از نظر سئو تبدیل کنید.', 1, '2023-02-09 10:25:29', '2024-12-08 06:58:49'),
(19, 'دستیار هوشمند اینستاگرام', 'instagram-assistant', 'باهوش ترین بازنویسنده محتوا مقالات وبلاگ یا هر نوع محتوا را در چند ثانیه بازنویسی کنید.', 1, '2023-02-09 10:23:19', '2024-12-08 06:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL COMMENT '3=RazorPay,4=''Stripe'',5=''Flutterwave'',6=''PayStack''',
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `duration` varchar(255) DEFAULT NULL COMMENT '1=1 Month,\r\n2=3Month\r\n3=6 Month\r\n4=1 Year\r\n5=lifetime\r\n',
  `days` int DEFAULT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `tools_limit` varchar(255) NOT NULL,
  `word_limit` int NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '1 = pending, 2 = yes/BankTransferAccepted,3=no/BankTransferDeclined',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `vendor_id`, `plan_id`, `plan_name`, `payment_type`, `payment_id`, `amount`, `duration`, `days`, `purchase_date`, `tools_limit`, `word_limit`, `expire_date`, `screenshot`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'پلن اول', '', '', 0, '1', 0, '2023-08-13 04:19:14pm', '1,2', 1000, '2023-09-12', NULL, NULL, '2023-08-13 16:19:14', '2023-08-13 16:19:14'),
(2, 2, 2, 'پلن دوم', 'banktransfer', NULL, 10000, '1', 0, '2023-08-13 05:25:08pm', '1,2,3,4,5', 1000, '2023-09-12', NULL, 2, '2023-08-13 16:19:34', '2023-08-13 17:25:08'),
(3, 2, 4, 'پلن چهارم', 'zarinpal', '000000000000000000000000000001187553', 20000, '1', 0, '2023-08-13 05:27:59pm', '0', 1000, '2023-09-12', NULL, 3, '2023-08-13 17:27:59', '2023-08-13 13:58:02'),
(4, 2, 4, 'پلن چهارم', 'zarinpal', '000000000000000000000000000001187554', 20000, '1', 0, '2023-08-13 05:28:11pm', '0', 1000, '2023-09-12', NULL, 3, '2023-08-13 17:28:11', '2023-08-13 13:58:14'),
(5, 2, 4, 'پلن چهارم', 'zarinpal', 'A00000000000000000000000000452411981', 20000, '1', 0, '2023-08-13 05:38:13pm', '0', 1000, '2023-09-12', NULL, 3, '2023-08-13 17:38:13', '2023-08-13 14:08:25'),
(6, 2, 4, 'پلن چهارم', 'zarinpal', '000000000000000000000000000001187555', 20000, '1', 0, '2023-08-13 05:43:40pm', '0', 1000, '2023-09-12', NULL, 2, '2023-08-13 17:43:40', '2023-08-13 14:13:43'),
(7, 2, 2, 'پلن دوم', 'zarinpal', '000000000000000000000000000001187557', 10000, '1', 0, '2023-08-13 05:45:11pm', '1,2,3,4,5', 1000, '2023-09-12', NULL, 2, '2023-08-13 17:45:11', '2023-08-13 14:15:16'),
(8, 2, 4, 'پلن چهارم', 'zarinpal', '000000000000000000000000000001187558', 20000, '1', 0, '2023-08-13 05:45:33pm', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', 1000, '2023-09-12', NULL, 2, '2023-08-13 17:45:33', '2023-08-13 14:15:35'),
(9, 2, 3, 'پلن سوم', 'zarinpal', '000000000000000000000000000001201114', 56000, '1', 0, '2023-08-30 04:23:10am', '1,2,3,4,5,6,7,8,9,10,11', 1000, '2023-09-29', NULL, 3, '2023-08-30 04:23:10', '2023-08-30 00:53:22'),
(10, 2, 2, 'پلن دوم', 'zarinpal', '000000000000000000000000000001204736', 39000, '1', 0, '2023-09-03 07:00:03pm', '1,2,3,4,5', 1000, '2023-10-03', NULL, 1, '2023-09-03 19:00:03', '2023-09-03 19:00:03'),
(11, 2, 2, 'پلن دوم', 'zarinpal', '000000000000000000000000000001204737', 39000, '1', 0, '2023-09-03 07:00:17pm', '1,2,3,4,5', 1000, '2023-10-03', NULL, 1, '2023-09-03 19:00:17', '2023-09-03 19:00:17'),
(12, 2, 2, 'پلن دوم', 'zarinpal', '000000000000000000000000000001204739', 39000, '1', 0, '2023-09-03 07:04:22pm', '1,2,3,4,5', 1000, '2023-10-03', NULL, 1, '2023-09-03 19:04:22', '2023-09-03 19:04:22'),
(13, 2, 4, 'پلن چهارم', 'banktransfer', NULL, 79000, '1', 0, '2024-10-07 07:18:02am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18', 1000, '2024-11-06', NULL, 2, '2024-10-07 07:16:35', '2024-10-07 07:18:02'),
(14, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-08 07:07:37am', '19', 1000, '2025-01-07', NULL, 2, '2024-12-08 07:06:54', '2024-12-08 07:07:37'),
(15, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-08 10:35:43am', '19', 1000, '2025-01-07', NULL, 2, '2024-12-08 10:35:08', '2024-12-08 10:35:43'),
(16, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-08 10:43:27am', '19', 1000, '2025-01-07', NULL, 2, '2024-12-08 10:43:13', '2024-12-08 10:43:27'),
(17, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-08 10:49:23am', '19', 1000, '2025-01-07', NULL, 2, '2024-12-08 10:49:17', '2024-12-08 10:49:23'),
(18, 2, 3, 'پلن سوم', 'banktransfer', NULL, 56000, '1', 0, '2024-12-08 11:32:47am', '1,2,3,4,5,6,7,8,9,10,11,19', 1000, '2025-01-07', NULL, 2, '2024-12-08 11:32:39', '2024-12-08 11:32:47'),
(19, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-08 11:36:18am', '19', 1000, '2025-01-07', NULL, 2, '2024-12-08 11:36:11', '2024-12-08 11:36:18'),
(20, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 1000, '1', 0, '2024-12-09 04:59:24am', '19', 1000, '2025-01-08', NULL, 2, '2024-12-09 04:57:36', '2024-12-09 04:59:24'),
(21, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 10000, '1', 0, '2024-12-09 05:19:18am', '19', 10000, '2025-01-08', NULL, 2, '2024-12-09 05:19:10', '2024-12-09 05:19:18'),
(22, 6, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 10000, '1', 0, '2024-12-09 07:47:15am', '19', 10000, '2025-01-08', NULL, 2, '2024-12-09 07:46:53', '2024-12-09 07:47:15'),
(23, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 10000, '1', 0, '2024-12-09 10:01:50am', '19', 10000, '2025-01-08', NULL, 2, '2024-12-09 10:01:09', '2024-12-09 10:01:50'),
(24, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000mrrjgnee', 10000, '1', 0, '2024-12-12 05:27:19am', '19', 10000, '2025-01-11', NULL, 3, '2024-12-12 05:27:19', '2024-12-12 02:00:29'),
(25, 2, 5, 'دستیار اینستاگرام', 'banktransfer', NULL, 10000, '1', 0, '2024-12-12 05:31:04am', '19', 10000, '2025-01-11', NULL, 2, '2024-12-12 05:30:37', '2024-12-12 05:31:04'),
(26, 2, 4, 'پلن چهارم', 'banktransfer', NULL, 79000, '1', 0, '2024-12-16 10:58:11am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-15', NULL, 2, '2024-12-16 10:57:27', '2024-12-16 10:58:11'),
(27, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000eeoprv6e', 10000, '1', 0, '2024-12-23 06:37:07am', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 06:37:07', '2024-12-23 06:37:07'),
(31, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-23 09:54:11am', '1,2,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 09:54:11', '2024-12-23 09:54:11'),
(32, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000mrgnmne1', 79000, '1', 0, '2024-12-23 10:02:33am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:02:33', '2024-12-23 10:02:33'),
(33, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000qye2jpep', 79000, '1', 0, '2024-12-23 10:02:53am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:02:53', '2024-12-23 10:02:53'),
(34, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000pyqm2ooz', 79000, '1', 0, '2024-12-23 10:22:16am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:22:16', '2024-12-23 10:22:16'),
(35, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000pyqm2o85', 79000, '1', 0, '2024-12-23 10:22:34am', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:22:34', '2024-12-23 10:22:34'),
(36, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000006qglo5ge', 79000, '1', 0, '2024-12-23 10:25:50', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:25:50', '2024-12-23 10:25:50'),
(37, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000001qnopd33', 79000, '1', 0, '2024-12-23 10:30:16', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:30:16', '2024-12-23 10:30:16'),
(38, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000006qgloy7d', 79000, '1', 0, '2024-12-23 10:32:01', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:32:01', '2024-12-23 10:32:01'),
(39, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000wxqre6w8', 79000, '1', 0, '2024-12-23 10:33:43', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:33:43', '2024-12-23 10:33:43'),
(40, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000mrgndwg8', 79000, '1', 0, '2024-12-23 10:34:39', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:34:39', '2024-12-23 10:34:39'),
(41, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000ge1rpqeq', 79000, '1', 0, '2024-12-23 10:38:11', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:38:11', '2024-12-23 10:38:11'),
(42, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000y57xe3ov', 79000, '1', 0, '2024-12-23 10:38:31', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:38:31', '2024-12-23 10:38:31'),
(43, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000005qrj8dly', 79000, '1', 0, '2024-12-23 10:38:45', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:38:45', '2024-12-23 10:38:45'),
(44, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000007zxj13vw', 79000, '1', 0, '2024-12-23 10:38:52', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:38:52', '2024-12-23 10:38:52'),
(45, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000rvl7pqrp', 79000, '1', 0, '2024-12-23 10:39:05', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:39:05', '2024-12-23 10:39:05'),
(46, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000dejw6z1p', 79000, '1', 0, '2024-12-23 10:40:45', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:40:45', '2024-12-23 10:40:45'),
(47, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000006qglzmvm', 79000, '1', 0, '2024-12-23 10:47:05', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:47:05', '2024-12-23 10:47:05'),
(48, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000pyqm31e3', 79000, '1', 0, '2024-12-23 10:47:29', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:47:29', '2024-12-23 10:47:29'),
(49, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000wxqrnevo', 79000, '1', 0, '2024-12-23 10:48:51', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:48:51', '2024-12-23 10:48:51'),
(50, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000z276llpq', 79000, '1', 0, '2024-12-23 10:49:03', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:49:03', '2024-12-23 10:49:03'),
(51, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000ge1rnnn3', 79000, '1', 0, '2024-12-23 10:49:26', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:49:26', '2024-12-23 10:49:26'),
(52, 2, 4, 'پلن چهارم', 'zarinpal', 'A000000000000000000000000000mrgnyq5q', 79000, '1', 0, '2024-12-23 10:50:12', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:50:12', '2024-12-23 10:50:12'),
(53, 2, 4, 'پلن چهارم', 'zarinpal', 'A0000000000000000000000000007zxj2qle', 79000, '1', 0, '2024-12-23 10:50:32', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 10:50:32', '2024-12-23 10:50:32'),
(54, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000rvl7ge3z', 10000, '1', 0, '2024-12-23 11:02:13', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:02:13', '2024-12-23 11:02:13'),
(55, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000l3rv6p8o', 1000, '1', 0, '2024-12-23 11:02:57', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:02:57', '2024-12-23 11:02:57'),
(56, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A0000000000000000000000000001qnog6l8', 1000, '1', 0, '2024-12-23 11:10:29', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:10:29', '2024-12-23 11:10:29'),
(57, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-23 11:25:20am', '1,2,19', 1000, '2025-01-22', NULL, 1, '2024-12-23 11:25:20', '2024-12-23 11:25:20'),
(58, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000eeozg1e3', 1000, '1', 0, '2024-12-23 11:52:16', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:52:16', '2024-12-23 11:52:16'),
(59, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A0000000000000000000000000001qnowrp7', 100, '1', 0, '2024-12-23 11:52:28', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:52:28', '2024-12-23 11:52:28'),
(60, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A000000000000000000000000000rvl7y6zz', 1000, '1', 0, '2024-12-23 11:53:32', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:53:32', '2024-12-23 11:53:32'),
(61, 2, 5, 'دستیار اینستاگرام', 'zarinpal', 'A0000000000000000000000000001qnow8dz', 1000, '1', 0, '2024-12-23 11:55:35', '19', 10000, '2025-01-22', NULL, 1, '2024-12-23 11:55:35', '2024-12-23 11:55:35'),
(62, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:00:26am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:00:26', '2024-12-24 05:00:26'),
(63, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:02:17am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:02:17', '2024-12-24 05:02:17'),
(64, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:10:28am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:10:28', '2024-12-24 05:10:28'),
(65, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:15:38am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:15:38', '2024-12-24 05:15:38'),
(66, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:30:00am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:30:00', '2024-12-24 05:30:00'),
(67, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:40:23am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:40:23', '2024-12-24 05:40:23'),
(68, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 05:50:59am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 05:50:59', '2024-12-24 05:50:59'),
(69, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:06:00am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:06:00', '2024-12-24 06:06:00'),
(70, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:13:03am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:13:03', '2024-12-24 06:13:03'),
(71, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:15:23am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:15:23', '2024-12-24 06:15:23'),
(72, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:25:18am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:25:18', '2024-12-24 06:25:18'),
(73, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:30:24am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:30:24', '2024-12-24 06:30:24'),
(74, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:36:08am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:36:08', '2024-12-24 06:36:08'),
(75, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:41:57am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:41:57', '2024-12-24 06:41:57'),
(76, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:48:21am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:48:21', '2024-12-24 06:48:21'),
(77, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 06:58:32am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 06:58:32', '2024-12-24 06:58:32'),
(78, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 07:08:04am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 07:08:04', '2024-12-24 07:08:04'),
(79, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 07:43:32am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 07:43:32', '2024-12-24 07:43:32'),
(80, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 07:49:26am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 07:49:26', '2024-12-24 07:49:26'),
(81, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 07:50:30am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 07:50:30', '2024-12-24 07:50:30'),
(82, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 07:52:44am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 07:52:44', '2024-12-24 07:52:44'),
(83, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 08:01:22am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 08:01:22', '2024-12-24 08:01:22'),
(84, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 08:09:08am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 08:09:08', '2024-12-24 08:09:08'),
(85, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 09:09:49am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 09:09:49', '2024-12-24 09:09:49'),
(86, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 09:29:08am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 09:29:08', '2024-12-24 09:29:08'),
(87, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 09:38:38am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 09:38:38', '2024-12-24 09:38:38'),
(88, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:13:20am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:13:20', '2024-12-24 10:13:20'),
(89, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:17:57am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:17:57', '2024-12-24 10:17:57'),
(90, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:30:27am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:30:27', '2024-12-24 10:30:27'),
(91, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:35:53am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:35:53', '2024-12-24 10:35:53'),
(92, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:42:29am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:42:29', '2024-12-24 10:42:29'),
(93, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 10:49:19am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 10:49:19', '2024-12-24 10:49:19'),
(94, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 11:01:12am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 11:01:12', '2024-12-24 11:01:12'),
(95, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 11:12:52am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 11:12:52', '2024-12-24 11:12:52'),
(96, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 11:13:02am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 11:13:02', '2024-12-24 11:13:02'),
(97, 9, 1, 'پلن اول', 'free', NULL, 0, '1', 0, '2024-12-24 11:13:24am', '1,2,19', 1000, '2025-01-23', NULL, 1, '2024-12-24 11:13:24', '2024-12-24 11:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `update_users`
--

CREATE TABLE `update_users` (
  `id` int NOT NULL,
  `SELF_UPDATER_ACCESS_TOKEN` varchar(255) NOT NULL,
  `use_version` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `ACCESS` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `update_users`
--

INSERT INTO `update_users` (`id`, `SELF_UPDATER_ACCESS_TOKEN`, `use_version`, `site_url`, `ACCESS`, `created_at`, `updated_at`) VALUES
(2, '55', NULL, NULL, 'yes', '2023-09-28 17:00:14', '2023-09-28 17:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apiKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 = normal , 2 = google , 3 = facebook',
  `type` tinyint(1) NOT NULL COMMENT '1=Admin,2=user',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `token_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int DEFAULT NULL COMMENT '1=COD,2=Wallet,3=Razorpay,4=stripe,5=Flutterwave,6=paystack',
  `referral_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '''0''',
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL COMMENT '1=Yes,2=No',
  `is_available` tinyint NOT NULL COMMENT '1=Yes,2=No	',
  `google_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalwordcount` bigint DEFAULT '0',
  `word_limit` int DEFAULT '0',
  `license_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hostdomain` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `mobile`, `apiKey`, `image`, `password`, `login_type`, `type`, `description`, `token_key`, `token`, `payment_id`, `plan_id`, `purchase_amount`, `purchase_date`, `payment_type`, `referral_code`, `wallet`, `otp`, `is_verified`, `is_available`, `google_id`, `facebook_id`, `remember_token`, `username`, `totalwordcount`, `word_limit`, `license_key`, `hostdomain`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '1234567890', NULL, 'default.png', '$2y$10$lu5FZhhiPux/sLxhQ5tnYuwLBhuZxbJSHjdYSNLrRP9FLgFqiV/WK', 'email', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-16 10:57:27am', NULL, NULL, '0', NULL, 1, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2022-09-03 05:54:32', '2023-08-11 17:48:57'),
(2, 'mahdi', 'mahdi-2', 'mahdi@gmail.com', '09190478451', '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', 'default.png', '$2y$10$lu5FZhhiPux/sLxhQ5tnYuwLBhuZxbJSHjdYSNLrRP9FLgFqiV/WK', NULL, 2, NULL, '6ccfd6f8599d32496462f6cd665a4459', NULL, '2', '4', '79000', '2024-12-16 10:57:27am', NULL, NULL, '\'0\'', '64366', 1, 1, NULL, NULL, NULL, NULL, 34291, 44000, NULL, NULL, '2023-08-13 12:48:40', '2024-12-23 07:36:46'),
(9, '', '', NULL, '09196610079', NULL, '', NULL, NULL, 2, NULL, NULL, NULL, '97', '1', '0', '2024-12-24 14:43:24', NULL, NULL, '\'0\'', NULL, 1, 1, NULL, NULL, NULL, NULL, 0, 38000, NULL, NULL, '2024-12-23 06:19:19', '2024-12-24 08:50:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `apikeys_key_unique` (`key`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemaddons`
--
ALTER TABLE `systemaddons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_users`
--
ALTER TABLE `update_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systemaddons`
--
ALTER TABLE `systemaddons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `update_users`
--
ALTER TABLE `update_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
