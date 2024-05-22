-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 03:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `circle_images`
--

CREATE TABLE `circle_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`, `description`, `image`, `coordinates`, `category`) VALUES
(1, 'John Doe', '123-456-7890', 'john@example.com', '123 Main St, City, Country', 'Short description about John Doe', 'bbc.jpg', '18.67820478583316, 73.89506266817462', 'dharmik'),
(2, 'Jane Doe', '987-654-3210', 'jane@example.com', '456 Elm St, City, Country', 'Short description about Jane Doe', 'jane_avatar.jpg', '34.052235,-118.243683', 'police nama'),
(3, 'Police Commissioner Office of Pune City\r\nपुणे शहर पोलीस आयुक्त कार्यालय\r\nPolice department', '02026126296', 'no email', 'GVCG+Q8J, Sadhu Vaswani chowk, Church Path, Agarkar Nagar, Pune, Maharashtra 411001', 'पुणे शहर पोलीस आयुक्त कार्यालय', 'ramcharan RRR movie looks.jpg', '18.523287849766785, 73.87345963679259', 'महाराष्ट्र पोलीस');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `kgf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_slider`
--

INSERT INTO `image_slider` (`title`, `description`, `image1`) VALUES
('Eleanor Roosevelt', 'No one can make you feel inferior without your consent.', 'Satoshi Nakamoto.jpg'),
('Anonymous', 'You can’t expect people to look eye to eye with you if you are looking down on them.', 'f923e1ae-da6a-4149-9d4e-2fd5cec74870.jpg'),
('Carl Schurz', 'Ideals are like stars; you will not succeed in touching them with your hands, but like the seafaring man on the desert of waters, you choose them as your guides, and following them, you reach your destiny.', '8ebd3c52-5b8b-43fe-bf6c-64f0e84335f7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `slider_image` text NOT NULL,
  `carousel_images` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `content` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image1`, `description`, `category`, `posted_by`, `created_at`, `slider_image`, `carousel_images`, `image2`, `image3`, `content`, `icon`) VALUES
(23, 'carry', 'uploads/IMG20210319181030.jpg', 'भारतीय राज्यघटनेतील २२ अधिकृत भाषांच्या यादीत मराठीचा समावेश आहे.महाराष्ट्राची मायबोली मराठी असल्याने महाराष्ट्र दिनानिमित्त \'मराठी राजभाषा दिन\' अर्थात \'मराठी भाषा दिन\' १ मे रोजी साजरा करण्याचा ऐतिहासिक निर्णय आधुनिक महाराष्ट्राचे शिल्पकार वसंतराव नाईक यांनी घेतला. तत्कालिन मुख्यमंत्री वसंतराव नाईक यांच्या सरकारने \'मराठी राजभाषा अधिनियम 1964\' सर्वप्रथम 11 जानेवारी 1965 रोजी प्रसिद्ध केला. या अधिनियमानुसार, महाराष्ट्राची अधिकृत राजभाषा ही मराठी असेल असे जाहीर करण्यात आले. त्यानंतर 1966 पासून या निर्णयाची अंमलबजावणी सुरू झाली. मराठीला राजभाषेचा दर्जा देऊन जणू मराठीचे राज्यभिषेक करून आधुनिक महाराष्ट्राचे शिल्पकार वसंंतराव नाईक सरकारने मराठीचा ऐतिहासिक गौरव केला.', 'kgf', 'self', '2024-05-01 15:53:24', '\r\n\r\nIMG20210319181030.jpg\r\nIMG20210319181030.jpg\r\nIMG20210319181030.jpg', 'IMG20210319181030.jpg\r\nIMG20210319181030.jpg', 'uploads/IMG20191028190349.jpg', '', '', 'fa-camera'),
(24, 'master', 'uploads/IMG20210319181030.jpg', 'प्रश्नः सद्गुरु, तुम्ही शिव महती सांगता. इतर गुरु जसे कि मास्टर्स ऑफ झेन यांच्या बद्दल का बोलत नाही? सद्गुरु: ब्रम्हांडातील ही प्रचंड पोकळी जिचा आपण शिव म्हणून उल्लेख करतो, ही अस्तित्वरहित अमर्याद, सदैव उपस्थित आणि सनातन आहे. पण मानवी कल्पना मर्यादित असल्याने, आपल्या संस्कृती आणि परंपरेत आपण शिवाची अनेक विस्मयकारक रूपे निर्माण केली आहेत. गूढ, अनाकलनीय असा ईश्वर. मंगलकारी असा शंभो. निस्वार्थी, साधा असा भोला; दक्षिणामूर्ती-वेद, शास्त्र आणि तंत्र यांचे महान गुरु आणि शिक्षक; क्षमाशील आशुतोष; भैरव-सृष्टीकर्त्याच्या रक्ताने रंगलेला, पूर्णतः स्थिर असा अचलेश्वर, नटराज-अत्यंत कुशल आणि उस्फुर्त नर्तक – जीवनाचे जितके पैलू त्या सर्व रुपांमधून त्याला साकार केले आहे.', 'kgf', 'self', '2024-05-01 15:53:27', '', '', '', '', '', ''),
(25, 'किस राक्षस से डरकर भागे थे भगवान शिव, कहानी में क्‍या है जीवन का सार', 'uploads/cdbfdfd5-4cff-4684-a543-90f245957a57.jpg', 'भगवान शिव के बारे में प्रचलित है कि वह थोड़ी सी तपस्‍या से आसानी से प्रसन्‍न हो जाते हैं. हालांकि, कई ऐसे उदाहरण भी हैं, जब किसी ने बड़ा वरदान पाने ने उनकी कठिन तपस्‍या भी की है. लंकाधिपति रावण ने भी अमरत्‍व का वरदान पाने के लिए भगवान शिव को अपने दस सिर चढ़ा दिए थे. भगवान शिव से जुड़ी ऐसी ही एक और कहानी है, जिसमें एक राक्षस ने शिवजी की घोर तपस्‍या कर उन्‍हें प्रसन्‍न किया था. हालांकि, वरदान देकर भगवान शिव खुद ही मुसीबत में फंस गए थे. बाद में भगवान विष्‍णु ने उन्‍हें इस मुसीबत से छुटकारा दिलाया था.  कहानी के मुताबिक, एक बार महर्षि नारद धरती पर घूम रहे थे. रास्‍ते में उन्हें वृकासुर नाम का राक्षस मिला. नारद मुनि को देखते ही उसने कहा कि मैं आपसे कुछ सलाह लेना चाहता हूं. आप मुझे बताइए कि ब्रह्मा, विष्णु और महेश में कौन देवता जल्‍द प्रसन्‍न हो जाते हैं. महर्षि नारद ने बहुत सोचने के बाद कहा कि वैसे तो तुम तीनों महादेवों में से किसी की भी तपस्या कर सकते हो. लेकिन, ब्रह्मा और विष्णु जल्दी प्रसन्‍न नहीं होते हैं. उनके लिए बहुत वर्षों तक कठिन तपस्या करनी पड़ती है. ये भी हो सकता है कि तुम्हारी आयु पूरी हो जाए, लेकिन तपस्या पूरी न हो. भगवान शंकर थोड़ी आराधना से ही प्रसन्‍न हो जाते हैं. वे अपने भक्त की इच्छा पूरी करने के लिए सोच-विचार नहीं करते हैं.  ये भी पढ़ें – शिव गृहस्‍थ होने के बाद भी श्‍मशान में क्‍यों रहते हैं, क्‍या इसमें छुपा है जीवन प्रबंधन का कोई सूत्र  वृकासुर का कठिन तप, शिवजी का प्रसन्‍न होना वृकासुर ने भगवान शंकर की आराधना करने का फैसला किया और हिमालय के केदार क्षेत्र में जाकर आराधना करने लगा. यज्ञ, जप, तप, ध्यान सब प्रकार से वह पूजा-पाठ करने लगा. कुछ दिनों के बाद उसने सोचा कि मैं शरीर और प्राण को ही भगवान शिव को अर्पित कर दूंगा. ऐसा सोचकर वह अपने शरीर का मांस काट-काट कर यज्ञकुंड में डालने लगा, लेकिन भगवान शिव प्रसन्‍न नहीं हुए. परेशान होकर एक दिन उसने अपना शीश काटकर भगवान शिव को अर्पित करने का फैसला किया. स्‍नान-ध्यान कर जैसे ही उसने खड़ग उठाकर अपना शीश काटना चाहा कि भगवान शंकर प्रकट होकर बोले, ‘बस करो, तुम्हारी तपस्या पूरी हुई. मैं तुम पर प्रसन्‍न हूं. वर मांगो.’', 'mahadev', 'self', '2024-05-01 16:14:20', '', '', '', '', '', ''),
(26, 'djl ', 'uploads/cdbfdfd5-4cff-4684-a543-90f245957a57.jpg', 'प्रश्नः सद्गुरु, तुम्ही शिव महती सांगता. इतर गुरु जसे कि मास्टर्स ऑफ झेन यांच्या बद्दल का बोलत नाही? सद्गुरु: ब्रम्हांडातील ही प्रचंड पोकळी जिचा आपण शिव म्हणून उल्लेख करतो, ही अस्तित्वरहित अमर्याद, सदैव उपस्थित आणि सनातन आहे. पण मानवी कल्पना मर्यादित असल्याने, आपल्या संस्कृती आणि परंपरेत आपण शिवाची अनेक विस्मयकारक रूपे निर्माण केली आहेत. गूढ, अनाकलनीय असा ईश्वर. मंगलकारी असा शंभो. निस्वार्थी, साधा असा भोला; दक्षिणामूर्ती-वेद, शास्त्र आणि तंत्र यांचे महान गुरु आणि शिक्षक; क्षमाशील आशुतोष; भैरव-सृष्टीकर्त्याच्या रक्ताने रंगलेला, पूर्णतः स्थिर असा अचलेश्वर, नटराज-अत्यंत कुशल आणि उस्फुर्त नर्तक – जीवनाचे जितके पैलू त्या सर्व रुपांमधून त्याला साकार केले आहे.', 'k', 'ek', '2024-05-01 17:06:12', '', '', '', '', '', ''),
(27, 'sivshakar', 'uploads/cdbfdfd5-4cff-4684-a543-90f245957a57.jpg', 'प्रश्नः सद्गुरु, तुम्ही शिव महती सांगता. इतर गुरु जसे कि मास्टर्स ऑफ झेन यांच्या बद्दल का बोलत नाही? सद्गुरु: ब्रम्हांडातील ही प्रचंड पोकळी जिचा आपण शिव म्हणून उल्लेख करतो, ही अस्तित्वरहित अमर्याद, सदैव उपस्थित आणि सनातन आहे. पण मानवी कल्पना मर्यादित असल्याने, आपल्या संस्कृती आणि परंपरेत आपण शिवाची अनेक विस्मयकारक रूपे निर्माण केली आहेत. गूढ, अनाकलनीय असा ईश्वर. मंगलकारी असा शंभो. निस्वार्थी, साधा असा भोला; दक्षिणामूर्ती-वेद, शास्त्र आणि तंत्र यांचे महान गुरु आणि शिक्षक; क्षमाशील आशुतोष; भैरव-सृष्टीकर्त्याच्या रक्ताने रंगलेला, पूर्णतः स्थिर असा अचलेश्वर, नटराज-अत्यंत कुशल आणि उस्फुर्त नर्तक – जीवनाचे जितके पैलू त्या सर्व रुपांमधून त्याला साकार केले आहे.', 'jn', 'jjjjjjjjjjjjjjjjjjjjj', '2024-05-01 17:34:40', '', '', '', '', '', ''),
(28, 'शिव पुराण – कथांमधून विज्ञान', 'uploads/cdbfdfd5-4cff-4684-a543-90f245957a57.jpg', 'प्रश्नः सद्गुरु, तुम्ही शिव महती सांगता. इतर गुरु जसे कि मास्टर्स ऑफ झेन यांच्या बद्दल का बोलत नाही? सद्गुरु: ब्रम्हांडातील ही प्रचंड पोकळी जिचा आपण शिव म्हणून उल्लेख करतो, ही अस्तित्वरहित अमर्याद, सदैव उपस्थित आणि सनातन आहे. पण मानवी कल्पना मर्यादित असल्याने, आपल्या संस्कृती आणि परंपरेत आपण शिवाची अनेक विस्मयकारक रूपे निर्माण केली आहेत. गूढ, अनाकलनीय असा ईश्वर. मंगलकारी असा शंभो. निस्वार्थी, साधा असा भोला; दक्षिणामूर्ती-वेद, शास्त्र आणि तंत्र यांचे महान गुरु आणि शिक्षक; क्षमाशील आशुतोष; भैरव-सृष्टीकर्त्याच्या रक्ताने रंगलेला, पूर्णतः स्थिर असा अचलेश्वर, नटराज-अत्यंत कुशल आणि उस्फुर्त नर्तक – जीवनाचे जितके पैलू त्या सर्व रुपांमधून त्याला साकार केले आहे.', 'mahadev', 'self', '2024-05-02 18:08:16', '', '', '', '', '', ''),
(29, 'avinash varma', 'bbc.jpg', 'podcast', 'goku / saitama', 'self', '2024-05-05 05:06:54', '', '', '', '', '', ''),
(30, 'ce', 'bbc.jpg', 'kd', 'd', '2', '2024-05-05 05:10:33', '', '', '', '', '', ''),
(32, '3d', 'bbc.jpg', 'dk', 'kj', 'kfvo', '2024-05-05 08:43:43', '', '', '', '', '', ''),
(33, 'nkg', '2763d87b-ba59-423e-ad13-41c3d2c1e730.jpg', 'kgk', 'rwk', 'rk', '2024-05-05 08:44:57', '', '', '', '', '', 'fa-camera'),
(34, 'jn', 'cc9882e3-e48b-42dd-9807-88244cb5f2d3 (1).jpg', 'ii', 'horrror', 'self', '2024-05-05 08:46:26', '', '', '', '', '', ''),
(37, 'zeno omni king', '', '', '', '', '2024-05-11 09:08:10', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status1`
--

CREATE TABLE `status1` (
  `title` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `circle_title` text NOT NULL,
  `circle_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status1`
--

INSERT INTO `status1` (`title`, `image1`, `image2`, `image3`, `image4`, `circle_title`, `circle_image`, `created_at`) VALUES
('police nama', 'bbc.jpg', 'bbc.jpg', 'bbc.jpg', 'bbc.jpg', '', '', '2024-05-14 16:17:18'),
('', '', '', '', '', 'police khaki', 'bbc.jpg', '2024-05-14 16:17:18'),
('', '', 'bbc.jpg', 'bbc.jpg', 'bbc.jpg', 'police nama', 'bbc.jpg', '2024-05-14 16:17:18'),
('', '', 'IMG20191231183725.jpg', 'Satoshi Nakamoto.jpg', 'cdbfdfd5-4cff-4684-a543-90f245957a57.jpg', 'maha shiv', 'IMG20191231183725.jpg', '2024-05-14 16:17:18'),
('', '', 'bbc.jpg', 'bbc.jpg', '', 'dbz', 'bbc.jpg', '2024-05-14 16:19:53'),
('bhai', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '57d3b32f-a333-4680-a87d-68427d45e052.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '', 'bhai', 'bhai', '2024-05-21 08:20:45'),
('28203ac6-5293-4837-ba23-5ec6c130f4c1', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1', '28203ac6-5293-4837-ba23-5ec6c130f4c1', '2024-05-21 08:21:59'),
('', '', '', '', '', 'makda', 'bbc.jpg', '2024-05-21 08:24:21'),
('', '', '', '', '', '', 'fram.jpg', '2024-05-21 08:25:07'),
('', 'fram.jpg', '28203ac6-5293-4837-ba23-5ec6c130f4c1.jpg', 'bbc.jpg', 'download (6).jpg', 'shiv', 'fram.jpg', '2024-05-21 08:46:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `circle_images`
--
ALTER TABLE `circle_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `circle_images`
--
ALTER TABLE `circle_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
