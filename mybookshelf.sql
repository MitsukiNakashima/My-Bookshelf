-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 7 月 12 日 23:23
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `bookshelf`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `history_books`
--

CREATE TABLE `history_books` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `isbn` varchar(30) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `finished_reading_at` date DEFAULT NULL,
  `evaluation` varchar(100) NOT NULL,
  `memory` text,
  `impression` text,
  `largeImageUrl` varchar(200) DEFAULT NULL,
  `share` varchar(10) NOT NULL,
  `recommend` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `history_books`
--

INSERT INTO `history_books` (`id`, `userId`, `isbn`, `title`, `author`, `finished_reading_at`, `evaluation`, `memory`, `impression`, `largeImageUrl`, `share`, `recommend`) VALUES
(1, 19, '9784622090151', '海馬を求めて潜水を', 'ヒルデ・オストビー/イルヴァ・オストビー', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べるqqqqqああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0151/9784622090151_1_2.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(4, 19, '9784426123581', '医師が教える薬のトリセツ', '橋本 将吉', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/3581/9784426123581.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(5, 19, '4533248098028', 'LLPS0730　仮面ライダー　BLACK　RX／宮内タカユキ　［ミュージックランドピアノ］', '', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8028/4533248098028.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(6, 19, '9784799109670', '14歳から考えるレイシズム', 'アリ　ラッタンシ', '2021-06-26', '★★★', 'nemui\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/9670/9784799109670.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(7, 19, '9784759316582', '文豪たちの美味しいことば', '山口 謡司', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/6582/9784759316582_1_2.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(8, 19, '9784409230541', '老い（上巻）新装版', 'シモーヌ・ド・ボーヴォアール/朝吹三吉', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0541/9784409230541.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(9, 19, '9784651201054', 'プロに教わる　安心！はじめての野菜づくり', '木嶋利男', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1054/9784651201054_1_4.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(10, 19, '9784525520168', '生命倫理への招待', '塩野 寛/清水 惠子', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0168/9784525520168.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(11, 19, '9784636976427', 'ピアノソロ　初級　こどもポップス定番30〜ありがとうの花〜', '', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/6427/9784636976427.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(12, 19, '9784569849744', '「人が集まる」組織のしくみ', '井戸 伸年', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/9744/9784569849744_1_2.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(13, 19, '9784804111100', '身体診察による栄養アセスメント', '奈良信雄/中村丁次', '2021-06-26', '★★★', '電話きらい\r\nrarararararara', '新しい考えを学べる', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8041/80411110.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(14, 19, '9784167110062', '秘密', '東野 圭吾', '2019-06-05', '★★★★★', 'この本友達に貸して返ってこない', 'とても面白い\r\n泣ける\r\n感動した', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0062/9784167110062.jpg?_ex=200x200', '1', '大切な人がいる人'),
(15, 19, '9784806912460', '50歳からはじめるハイキングの教科書', '加藤庸二', '2021-06-27', '★★★', 'とっても眠い早く寝たい', 'ハイキング〜〜〜〜〜〜', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2460/9784806912460.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(16, 19, '9784780424652', 'nanahoshiのおりがみ手紙 アイデアBOOK ちょこっと折って、気持ちを伝える', 'たかはし なな', '2021-06-27', '★★★', 'ピタゴラスイッチ', 'ラーララリラっララ入りリッらー', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/4652/9784780424652_1_2.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(18, 19, '9784830949531', '持続可能な開発目標（SDGs）と開発資金', '浜名 弘明', '2021-06-09', '★★★', '', '新しい考えを学べるqqqqqああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/9531/9784830949531.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(19, 19, '9784393912089', 'ベートーヴェン・ピアノ・ソナタ（8）', 'ルードヴィヒ・ヴァン・ベートーヴェン/園田高弘', '2021-06-29', '★★★', '', '', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2089/9784393912089.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(20, 19, '9784081135684', 'HUNTER×HUNTER（05）', '冨樫義博', '2021-06-29', '★★★', '', 'aああああああああああああああああああああああああああああああああああああああああああああああああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/5684/9784081135684.jpg?_ex=200x200', '1', '前向きな気持ちになりたい人'),
(21, 19, '9784775941638', '交渉の達人', 'ディーパック・マルホトラ/マックス・H．ベイザーマン', '2021-06-28', '★★★', 'ああああああああああああああああああ', 'いいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1638/9784775941638.jpg?_ex=200x200', '0', '前向きな気持ちになりたい人'),
(22, 19, '9784062730174', '悪意', '東野 圭吾', '2021-03-03', '★★★', 'かきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけこかきくけかきくけこかきくけここ', '最高に面白いおすすめアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオアイウエオ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0174/9784062730174.jpg?_ex=200x200', '1', '悲しい気持ちの人'),
(23, 21, '9784041084427', 'AX アックス', '伊坂　幸太郎', '2021-07-02', '★★★', '初めて本当の徹夜しました', 'おもしろーーい。さおこーーーーーう', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/4427/9784041084427.jpg?_ex=200x200', '1', '前向きになりたい人'),
(24, 19, '9784041096741', '魔力の胎動', '東野　圭吾', '2021-06-29', '★★★★★', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaa', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/6741/9784041096741.jpg?_ex=200x200', '1', '若い人'),
(25, 19, '9784344037731', '白鳥とコウモリ', '東野 圭吾', '2021-06-27', '★★★★★', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7731/9784344037731.jpg?_ex=200x200', '1', '若い人'),
(26, 19, '9784163908717', '沈黙のパレード', '東野 圭吾', '2021-06-29', '★★★★★', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8717/9784163908717.jpg?_ex=200x200', '1', '悲しい気持ちの人'),
(27, 19, '9784334913724', 'ブラック・ショーマンと名もなき町の殺人', '東野圭吾', '2021-06-29', '★★★★★', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/3724/9784334913724.jpg?_ex=200x200', '1', '知識を増やしたい人'),
(28, 19, '9784062730174', '悪意', '東野 圭吾', '2021-06-09', '★★★★★', 'あああああああああああ', 'ああああああああああああああああああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0174/9784062730174.jpg?_ex=200x200', '1', '悲しい気持ちの人'),
(29, 22, '9784087474398', '白夜行', '東野圭吾', '2021-07-05', '★★★★★', 'いいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい', '面白い最高\r\n', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/4398/9784087474398.jpg?_ex=200x200', '1', '前向きになりたい人'),
(30, 22, '9784033130200', 'あひるのバーバちゃん', '神沢利子/山脇百合子（絵本作家）', '2021-06-30', '★★★', 'えええええええええええええええええええええええええええええええええええええええええええ絵', 'かわいい楽しくなる本', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0200/9784033130200.jpg?_ex=200x200', '1', '悲しい気持ちの人'),
(31, 22, '9784870141537', 'にげてさがして', 'ヨシタケシンスケ', '2021-02-04', '★★★★★', 'おおおおおおおおおおおおおおおおおおおお', '深い\r\nこの人の本は深い', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1537/9784870141537.jpg?_ex=200x200', '1', '前向きになりたい人'),
(32, 22, '9784065245088', '東京ディズニーリゾート　トリビアガイドブック', 'ディズニーファン編集部', '2021-06-29', '★★★', 'ああああああああああああ', 'ディズニー行きたくなる本', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/5088/9784065245088_1_2.jpg?_ex=200x200', '0', '自分に自信がない人'),
(33, 22, '9784087452068', 'マスカレード・ホテル', '東野圭吾', '2021-06-29', '★★★★★', 'あああああああああああ嗚呼', 'あああああああああああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2068/9784087452068.jpg?_ex=200x200', '1', '悲しい気持ちの人'),
(34, 22, '9784087717044', '逆ソクラテス', '伊坂 幸太郎', '2021-06-28', '★★★★<', '嗚呼嗚呼嗚呼嗚呼嗚呼ああ', '嗚呼嗚呼あああ嗚呼ああ', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7044/9784087717044.jpg?_ex=200x200', '1', '前向きになりたい人'),
(35, 22, '9784834023756', 'サンドイッチサンドイッチ', '小西英子（絵本）', '2021-06-29', '★★', '嗚呼嗚呼嗚呼あああああ', 'あああ嗚呼嗚呼', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/3756/9784834023756.jpg?_ex=200x200', '1', '前向きになりたい人'),
(36, 22, '9784041084427', 'AX アックス', '伊坂　幸太郎', '2021-06-29', '★★★★<', '嗚呼嗚呼嗚呼', '嗚呼嗚呼嗚呼嗚呼あああ嗚呼', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/4427/9784041084427.jpg?_ex=200x200', '1', '前向きになりたい人');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `isbn` int(30) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `impression` text,
  `evaluation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `reading_books`
--

CREATE TABLE `reading_books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `userId` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `salesDate` varchar(30) DEFAULT NULL,
  `publisherName` varchar(50) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `itemUrl` varchar(100) DEFAULT NULL,
  `largeImageUrl` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `reading_books`
--

INSERT INTO `reading_books` (`id`, `isbn`, `userId`, `title`, `author`, `salesDate`, `publisherName`, `size`, `itemUrl`, `largeImageUrl`) VALUES
(1, '9784388062508', 18, '中国料理技術入門復刻版', '陳建民/黄昌泉', '2016年12月', '柴田書店', '単行本', 'https://books.rakuten.co.jp/rb/14539863/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2508/9784388062508.jpg?_ex=200x200'),
(2, '9784622090151', 18, '海馬を求めて潜水を', 'ヒルデ・オストビー/イルヴァ・オストビー', '2021年06月23日頃', 'みすず書房', '単行本', 'https://books.rakuten.co.jp/rb/16723430/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0151/9784622090151_1_2.jpg?_ex=200x200'),
(3, '9784388062508', 19, '中国料理技術入門復刻版', '陳建民/黄昌泉', '2016年12月', '柴田書店', '単行本', 'https://books.rakuten.co.jp/rb/14539863/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2508/9784388062508.jpg?_ex=200x200'),
(6, '4528189677807', 19, '【バーゲン本】大腸がんーよくわかる最新医学', '福長　洋介', '', '（株）主婦の友社', '単行本', 'https://books.rakuten.co.jp/rb/16594720/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7807/4528189677807.jpg?_ex=200x200'),
(9, '9784569848006', 19, 'Day1[デイ・ワン]', 'ジャスパー・チャン', '2021年07月01日頃', 'PHP研究所', '単行本', 'https://books.rakuten.co.jp/rb/16417861/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8006/9784569848006_1_2.jpg?_ex=200x200'),
(12, '9784047332690', 19, 'スプラトゥーン2　イカすアートブック（1）', '週刊ファミ通編集部', '2017年11月29日頃', 'KADOKAWA　Game　Linkage', '単行本', 'https://books.rakuten.co.jp/rb/15207179/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2690/9784047332690.jpg?_ex=200x200'),
(13, '9784152100290', 19, '2030', 'マウロ・ギレン/江口　泰子', '2021年06月16日頃', '早川書房', '単行本', 'https://books.rakuten.co.jp/rb/16708451/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0290/9784152100290_1_13.jpg?_ex=200x200'),
(14, '9784806912460', 19, '50歳からはじめるハイキングの教科書', '加藤庸二', '2012年06月', 'つちや書店', '単行本', 'https://books.rakuten.co.jp/rb/11733858/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2460/9784806912460.jpg?_ex=200x200'),
(16, '9784534058621', 19, '最強のFX　15分足デイトレード　実践テクニック', 'ぶせな', '2021年07月16日頃', '日本実業出版社', '単行本', 'https://books.rakuten.co.jp/rb/16754268/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8621/9784534058621.gif?_ex=200x200'),
(18, '9784062730174', 19, '悪意', '東野 圭吾', '2001年01月15日頃', '講談社', '文庫', 'https://books.rakuten.co.jp/rb/1307355/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0174/9784062730174.jpg?_ex=200x200'),
(20, '9784775941638', 19, '交渉の達人', 'ディーパック・マルホトラ/マックス・H．ベイザーマン', '2016年10月', 'パンローリング', '単行本', 'https://books.rakuten.co.jp/rb/14508285/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1638/9784775941638.jpg?_ex=200x200'),
(21, '9784902078633', 19, '遠藤彰子《四季》のすべて', '森山明子/遠藤彰子', '2021年03月30日頃', '美学出版', '単行本', 'https://books.rakuten.co.jp/rb/16691429/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8633/9784902078633.jpg?_ex=200x200'),
(23, '9784622090151', 19, '海馬を求めて潜水を', 'ヒルデ・オストビー/イルヴァ・オストビー', '2021年06月23日頃', 'みすず書房', '単行本', 'https://books.rakuten.co.jp/rb/16723430/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0151/9784622090151_1_2.jpg?_ex=200x200'),
(30, '9784101250267', 21, 'ゴールデンスランバー', '伊坂 幸太郎', '2010年12月', '新潮社', '文庫', 'https://books.rakuten.co.jp/rb/6875974/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0267/9784101250267.jpg?_ex=200x200'),
(31, '9784866430232', 21, '猫がいるしあわせ', '駒猫', '2018年07月', 'アチーブメント出版', '単行本', 'https://books.rakuten.co.jp/rb/15363338/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0232/9784866430232.jpg?_ex=200x200'),
(33, '9784344037731', 19, '白鳥とコウモリ', '東野 圭吾', '2021年04月07日頃', '幻冬舎', '単行本', 'https://books.rakuten.co.jp/rb/16637084/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7731/9784344037731.jpg?_ex=200x200'),
(36, '9784163908717', 19, '沈黙のパレード', '東野 圭吾', '2018年10月11日頃', '文藝春秋', '単行本', 'https://books.rakuten.co.jp/rb/15620091/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8717/9784163908717.jpg?_ex=200x200'),
(38, '9784101250267', 22, 'ゴールデンスランバー', '伊坂 幸太郎', '2010年12月', '新潮社', '文庫', 'https://books.rakuten.co.jp/rb/6875974/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0267/9784101250267.jpg?_ex=200x200'),
(39, '9784101250328', 22, 'ホワイトラビット', '伊坂 幸太郎', '2020年06月24日頃', '新潮社', '文庫', 'https://books.rakuten.co.jp/rb/16343862/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0328/9784101250328.jpg?_ex=200x200'),
(40, '9784041009772', 22, 'マリアビートル', '伊坂　幸太郎', '2013年09月', 'KADOKAWA', '文庫', 'https://books.rakuten.co.jp/rb/12455699/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/9772/9784041009772.jpg?_ex=200x200'),
(42, '9784842107967', 22, '英語のエキス', '佐香武彦', '2018年06月', '右文書院', '単行本', 'https://books.rakuten.co.jp/rb/15511790/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7967/9784842107967.jpg?_ex=200x200'),
(43, '4528189697850', 22, '【バーゲン本】40才からのやりなおしの英文法', '大久保　一也', '', '（有）明日香出版社', '単行本', 'https://books.rakuten.co.jp/rb/16755945/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7850/4528189697850_1_2.jpg?_ex=200x200'),
(44, '9784309291307', 22, 'みつけてかぞえてどこどこどうぶつミニ', 'ガレス・ルーカス/ルース・ラッセル', '2021年05月27日頃', '河出書房新社', '絵本', 'https://books.rakuten.co.jp/rb/16672428/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1307/9784309291307_1_4.jpg?_ex=200x200'),
(45, '9784834008999', 22, 'きんぎょが にげた', '五味太郎', '1982年08月', '株式会社 福音館書店', '絵本', 'https://books.rakuten.co.jp/rb/21971/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8999/9784834008999.jpg?_ex=200x200'),
(46, '9784522435892', 22, 'スゴイ！【語彙力】', '大人の言葉研究会', '2019年08月', '永岡書店', '単行本', 'https://books.rakuten.co.jp/rb/15992426/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/5892/9784522435892.jpg?_ex=200x200'),
(48, '9784592762744', 22, 'あつかったら ぬげばいい', 'ヨシタケ シンスケ', '2020年08月25日頃', '白泉社', '絵本', 'https://books.rakuten.co.jp/rb/16366849/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2744/9784592762744.jpg?_ex=200x200'),
(49, '9784893096609', 22, 'ころべばいいのに', 'ヨシタケシンスケ', '2019年06月19日頃', 'ブロンズ新社', '絵本', 'https://books.rakuten.co.jp/rb/15894024/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/6609/9784893096609.jpg?_ex=200x200'),
(50, '9784834013337', 22, 'どんぐりかいぎ', 'こうやすすむ/片山健（絵本作家）', '1995年10月', '福音館書店', '絵本', 'https://books.rakuten.co.jp/rb/751515/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/3337/9784834013337.jpg?_ex=200x200'),
(53, '9784065148945', 22, '希望の糸', '東野 圭吾', '2019年07月05日頃', '講談社', '単行本', 'https://books.rakuten.co.jp/rb/15913830/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8945/9784065148945.jpg?_ex=200x200'),
(55, '9784344037731', 22, '白鳥とコウモリ', '東野 圭吾', '2021年04月07日頃', '幻冬舎', '単行本', 'https://books.rakuten.co.jp/rb/16637084/', 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/7731/9784344037731.jpg?_ex=200x200');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `favorite_book` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT '0' COMMENT '0:会員　1:管理者',
  `del_flg` int(11) NOT NULL DEFAULT '0' COMMENT '論理削除(0：表示 1:非表示)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `password`, `favorite_book`, `role`, `del_flg`) VALUES
(10, '中嶋', NULL, 'aaa@co.jp', '$2y$10$IjhZdxAL2nVJk3U.e1wXNOoBzRrg8ijmyrqfg5QbNkMbVKotWbOKW', NULL, NULL, 1),
(11, 'ネ', NULL, 'mitsuki.0312.crayon@gmail.com', '$2y$10$AO6sQ/sSgDqUFrpqqgOWy.y9GIjXfbh.YGAm.Yr0CsJQG7ij1yJt.', NULL, NULL, 1),
(12, '中嶋', NULL, 'kkk@adm.jp', '$2y$10$thOHT4nkeyNdaqUXVc2ONeWiZL31kOr9/9O57V3jrJRw5GpSNCq1q', NULL, NULL, 1),
(13, '山田太郎', NULL, 'test@test.co.jp', '$2y$10$HraT4BN5/2lJPa/nbSxMWun9Uu2dJj6dzTy72xs0dZSQOKaLZJFrq', NULL, NULL, 1),
(17, '中嶋', 'みつき', 'mmm@jp', '$2y$10$iK.l1HHk9qaVcsv.INAQ.egyLd59DAp5q/TqnlAyu/B8PpdKjHulG', 'アイウエオ', 0, 1),
(18, '中嶋美月', 'みつき', 'www@co.jp', '$2y$10$cCd4Orj6tbRXio3wODCYt.iAQBo4vv8zHHWGLiorZUYdq0HCW3ZnG', 'さかな', 0, 1),
(19, '中嶋美月', 'みつき', 'ppp@co.jp', '$2y$10$OyBOyciwjZENEFHLZva5i.6OFgbRO4rE/Uqv2X0cjYnP03K8WEFvG', 'さかな', 0, 0),
(20, '山田太郎', NULL, 'kannri@k.co.jp', '$2y$10$qHE4CVZmDS/Ebda6v88DeebOt1L58q56MAgNTcBkGntOXMLBPX71O', NULL, 1, 0),
(21, '中嶋千里', 'チー', 'ttt@t.co.jp', '$2y$10$9goh889SAcl/bQ3sdG93lOcvagLf0vtm7jVL1Wy6uQaH1ZE6vp4v.', 'ゴールデンスランバー', 0, 0),
(22, '中嶋　美月', NULL, 'mmmm@g.com', '$2y$10$LXBjU3b7GGr1wlIewMCCouEMQBeKLrQhbHRvaTlgc86FekMWQmSc2', NULL, 0, 0),
(23, '山田テスト', NULL, 'test@co.jp', '$2y$10$bH2EAVrQl4RX9e6Bl3AHXuEsyEddqUL8PQMvLA2sFPpYN3gDAI4dy', NULL, 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `history_books`
--
ALTER TABLE `history_books`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `reading_books`
--
ALTER TABLE `reading_books`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `history_books`
--
ALTER TABLE `history_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reading_books`
--
ALTER TABLE `reading_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
