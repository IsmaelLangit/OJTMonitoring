-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 06:18 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `company_head` varchar(60) NOT NULL,
  `position` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `address`, `company_head`, `position`) VALUES
(1, 'Texas Instruments', 'PEZA Loakan, Baguio City 2600', 'Manie Mendoza', 'Recuritment Manager'),
(2, 'Docpro Business Solutions', 'Mezzanine Floor, CYA Centrum, Military Cut-Off', 'Rudy Clemente Jr.', 'Senior Partner'),
(3, 'Linkage', 'Quezon Hill Road 1, Calle Uno', 'Cristina Chua', 'Trainee'),
(4, 'National Grid Corporation Of The Philippines', 'Poro Point, San Fernando City, La Union', 'Jesus Belonso', 'HR Manager/HR Division of NGCP'),
(5, 'Philippine Military Academy', 'Fort Del Pilar, Loakan Road, 2600 Benguet', 'Maria Monica C. Costales, PhD', 'Supervising Admin Officer (HRMO IV) Chief Civilian Personnel Affairs, OMA1'),
(6, 'ITCert Training Solutions', 'G/F SAJJ Building, Rimando Road, Baguio City', 'Lou Philip Beltran', 'Headmaster/CEO'),
(7, 'Noble Trends Unbound, Inc', 'The Norwegian Collection Inc Bldg, Baguio Economic Zone, Loakan Rd, Baguio City', 'Mary Salome Lea B. Licudine', 'HR Manager'),
(8, 'MOOG Controls Corporation', 'Loakan Road, Baguio City', 'Rayah Sarile', 'HR Head'),
(9, 'Chungdahm International', 'RSVP Building, 4 First Road, Quezon Hill, Baguio City', 'Benigno Rosalino D. Cariaga', 'Operations Manager'),
(10, 'Benguet Provincial Capitol', 'Halsema Highway, La Trinidad, Benguet', 'Gov. Cresencio C. Pacalso', 'Governor'),
(11, 'Coca-Cola FEMSA Bottlers Bottlers Philippines Inc.', 'Bued, Calasiao, Pangasinan', 'Michael D. Fabroa', 'HR Executive'),
(12, 'SITEL', 'PEZA Loakan, Baguio City 2600', 'Lou Philip Beltran', 'Network Engineer'),
(13, 'Philippine Long Distance Telephone Company (PLDT)', 'Baguio City', 'John Gerald S. Marasigan', 'Senor Manager'),
(14, 'Baguio City Hall', 'City Hall Drive, Baguio City', 'Atty. Leticia O. Clemente', 'City Budget Officer'),
(15, 'Utalk Tutorial Services', '#11 First Road, Quezon Hill, Baguio City', 'Norraine M. Dadula', 'Senior Operations Manager'),
(16, 'Office of the City Councilor', 'City Hall, City Hall Drive, Baguio City', 'Leandro B. Yangot Jr.', 'City Councilor'),
(17, 'Labrador Munincipal Hall, Accounting Office', 'Labrador Munincipal Hall, Poblacion Labrador, Pangasinan', 'Fern Ann S. Zambrano', 'Municipal Accountant'),
(18, 'Philippine Statistics Authority, CAR', '141 Abanao Extension, Baguio City 2600', 'Villafe P. Alibuyog', 'Regional Director'),
(19, 'Metphil Medical Company', '3F Insular Life Building, Abanao Extension, Baguio City', 'Ivy D. Gayon', 'HR Manager'),
(20, 'Department of Information and Communications Technology', 'Polo Field, Pacdal, Baguio City', 'William Rojas', 'Director II'),
(21, 'Department of Interior and Local Government', '125 North Drive, Baguio City, Benguet', 'Engr. Marlo L. Iringan', 'Regional Director, DILG CAR'),
(22, 'ITech-PFS Technology Inc.', 'Unit 3 D West Burnham Place', 'Sharon Q. Dalang', 'Branch Manager'),
(23, 'Department of Agrarian Reform (CAR) ', '#39 M. Roxas St. Trancoville, Tabora Barangay, Baguio City', 'Atty. Marjorie P. Ayson', 'Regional Director'),
(24, 'Department of Education (Baguio City Division)', '#82 Military Cut-Off, Baguio City', 'Olivia Gomez', 'Planning Officer III'),
(25, 'Gottes Segen Language Tutorial Center', 'Rm. A4, Juniper Building, Bonifacio Street, Baguio City', 'Alpha Mae Pacio', 'School Director'),
(26, 'GMS Technology', '3F La Brea Inn, Lower Session Road, Baguio City', 'Arch. Gueliro M. Sugano', 'Director'),
(27, 'School of Computing and Information Sciences (SCIS), Saint Louis University', '3rd Floor, Silang Building, Saint Louis University', 'Dr. Cecillia A. Mercado', 'School Dean'),
(28, 'PhilHealth', 'Leonard Wood, Baguio City', 'Atty. Jerry F. Ibay', 'Resional Vice President'),
(29, 'Philippine Scandanavian IT Solutions', '339 G A Yupangco Bldg. Sen. Gil Puyat, Makati City', 'Rachel Christensen', 'Director'),
(30, 'Baguio-Benguet Community Credit Cooperative', '#56 Cooperative Street, Assumption Road, Baguio City', 'Mary Ann B. Bungag', 'Manager'),
(31, 'Post Ad Ventures Inc.', '599 Pina Avenue, Sta. Mesa, Manila', 'Flor Hardin', 'Database Manager'),
(32, 'Syner G Outsourcing', '#2 Lower Ground Floor, Roman Ayson Road, Cresencia Village, Baguio City', 'Joseph Opis Alisisto', 'Section Head'),
(33, 'Incubix Technologies Inc. ', '28th Floor Wideout Office Pacific Star Bldg. Sen Gil Puyat Avenue, Corner Makati Avenue, Makati Avenue, Makati City', 'Carmela Baronda', 'HR Manager, Executive Assistant'),
(34, 'Magnetite Branch, Pru Life UK', '3/F DBP Building, Lower Session Road, Baguio City', 'Myrna Lazo Solimen', 'Branch Manager'),
(35, 'ICT Department, DepEd Division Ofice, Baguio City', '#82 Military Cut-off Road, Baguio City, Benguet', 'Harris G. Dizon', 'IT Department Head and Officer'),
(36, 'Department of Environment and Natural Resources (CAR Division)', 'DENR Compound, Pacdal, Baguio City', 'Engr. Ralph C. Pablo', 'Regional Director '),
(37, 'Convergys', 'Ayalaland Technohub, John Hay Special Economic Zone', 'Ma. Faye Castillo', 'Recruitment Manager'),
(38, 'Calle Uno Coworking Space: Virtuo Research Inc.', '#3 Josefa Llanes Escoda St. First Road, Quezon Hill, Baguio City', 'Melanie Racela', 'Supervisor/Head of Research'),
(39, 'Alta Philippines IT Solutions and Web Page Design Inc.', '16F N3 Burgundy Corporate Tower, 152 Sen. Gil Puyat, Makati City', 'Edwin Cdwaling Jr.', 'HR Director'),
(40, '8Layer Technologies, Inc.', 'Unit 503 Seven East Capitol Bldg.#7 East Capitol Drive, Corner Sta. Rosa Street', 'Jeanniel Ilago', 'HR Manager'),
(41, 'On Semiconductor Manufacturing Philippines', 'Luisita Industrial Park, San Miguel, Tarlac City', 'Beth Pajaro', 'Human Resource Staff'),
(42, 'Trend Micro', '8th Floor Tower 2, The Rockwell Buisiness Center, Ortigas Avenue, Pasig City, 1600', 'Joanna Aguinaldo', 'HR Manager, Requirement and Business Partner'),
(43, 'Sutherland', 'Ground Floor Luke Foundation Building, 90 Leonard Wood Road, Corner Cabinet Hill', 'Patricia Jeff Garcia-Damasco', 'Resource Specialist'),
(44, 'Acestar Solutions and Trading Inc.', 'PEZA Bldg/ Loakan, Baguio City', 'Folly Samson', 'Manager'),
(45, 'HR Department', 'John Hay Management Corporation, Camp John Hay, Baguio City', 'Danny B. Latawan', 'HR Manager'),
(46, 'Sycip Gorres Velayo & Co, Memeber Firm of Ernst and Young Global', '6760 Ayala Avenue, Makati, 1226', 'Warren R. Bituin', 'Partner'),
(47, 'AKTUS Global Mgmt. Inc', 'Unit 2005 C, 20/F West Tower, PSC, Tektite Bldg, Ortigas, Pasig City', 'Esteven D. Fulgar', 'POT Head'),
(48, 'Saint Louis University EISSIF', 'CCA Room C016, Saint Louis University', 'Edmund B. Benaurdez', 'Director'),
(49, 'National Telecommunications Commission', 'Leonard Wood Road, Baguio City, Benguet', 'Engr. Dante M. Vengua', 'Officer-In-Charge '),
(50, 'Manulife', '2F ES Clemente Building Shanum St. Cor. Otek St. Corner Lake Drive, Burnham Park, Baguio City', 'Joey M. Mejia', 'Unit Head - Polaris Jaguar Unit'),
(51, 'IT/CS Department, SCIS', '3rd Floor, Silang Building, Saint Louis University', 'Ma. Concepcion Clemente', 'Department Head'),
(52, 'Information and Communications Technology Research Laboratory', '3rd Floor, Silang Building, Saint Louis University', 'Carlos Ben Montes', 'Officer-in-Charge'),
(53, 'Device Dynamics Asia', 'LGF The Norwegian Building, PEZA, Loakan Road, Camp John Hay, Baguio City', 'Shirley Joyy L. Cabrol', 'Human Resource Supervisor'),
(54, 'Accent Micro Technologies Incorporated', '8/F East Tower, Philippine Stock Exchange Ortigas Center, Pasig City 1605 ', 'Imna Rizza Abiera', 'Recruitment Offiver'),
(55, 'OIC Academic, Government and Community Partnership - Baguio', 'Loakan Road, Baguio City', 'Maria Lourdes Sison', 'Learning Specialist'),
(56, 'Department of Social Welfare and Development', '#40 North Drive, Baguio City', 'Bonafe Ramos-Boado', 'Training Specialist 1'),
(57, 'Commission on Elections ', 'Gov. Pack Road, Baguio City', 'Atty. John Paul A. Martin', 'Election Officer');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `first_name` varchar(35) DEFAULT NULL,
  `courseyear` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `last_name`, `first_name`, `courseyear`, `mobile_number`, `email`, `company_id`) VALUES
(2107368, 'Obena', 'Jason', 'BSIT 4', '09390105758', 'obenajason@gmail.com', 2),
(2108867, 'Afsarikashi', 'Mehdi', 'BSIT 4', '09062658383', 'ix56@yahoo.com', 24),
(2115153, 'Criste', 'Princess Marie Rose', 'BSIT 4', '09156764014', 'cescriste@gmail.com', 8),
(2117919, 'Belocura', 'Lairde Vincent', 'BSIT 4', '09353146797', 'lairde29@gmail.com', 49),
(2120329, 'Rull', 'Alexandria', 'BSIT 4', '09772570566', NULL, 56),
(2121920, 'Espiritu', 'Christopher Edrian L.', 'BSIT 3', '09750081447', '2121920@slu.edu.ph', 5),
(2122831, 'Salazar', 'Jean Michael', 'BSIT 4', '09770862591', 'jmsalazar0111@gmail.com', 49),
(2123700, 'Oydoc', 'Raya Marie J.', 'BSIT 4', '09465201245', 'rayaoydoc@gmail.com', 24),
(2123961, 'Aberin', 'Alvin Jan', 'BSCS 4', '09151303051', 'alvinaberin@gmail.com', 43),
(2124586, 'Apostol', 'Shirlene', 'BSIT 4', '09565596293', 'shirleneapostol008@gmail.com', 2),
(2125185, 'Orian', 'John Kevin', 'BSIT 4', '09999014045', 'kevin.orian@yahoo.com', 35),
(2125241, 'Ishii', 'Satoyoshi', 'BSIT 4', '09207116402', 'ishiisatoyoshi@gmail.com', 38),
(2126126, 'Barbuco', 'Christian Aris', 'BSIT 3', '09062620907', 'ArisBarbuco@gmail.com', 38),
(2127538, 'Rai', 'Michael Angelo', 'BSIT 4', '09260827646', 'michaelangelorai@gmail.com', 56),
(2130240, 'Tomines', 'Steven Michael', 'BSIT 3', '09773038070', 'Tomines.Steven@gmail.com', 2),
(2130906, 'Marquez', 'Jorge Clarence', 'BSCS 4', '09301781349', 'jorgeclarence007@gmail.com', 43),
(2131506, 'Julhusin', 'Jomari', 'BSIT 3', '09365886378', '2131506@slu.edu.ph', 32),
(2132368, 'Opiniano', 'Kieth Christian R.', 'BSIT 4', '09989971496', 'kiethopiniano21@gmail.com', 36),
(2132852, 'Nuezca', 'Jorge Kenneth', 'BSIT 4', NULL, 'nuezcajorge@gmail.com', 18),
(2133376, 'De Guzman', 'Jay Esmane', 'BSIT 4', '09051425944', 'jayyydeguzman@gmail.com', 53),
(2133513, 'Cayago', 'Zam', 'BSCS 4', '09167791813', 'zcayago@gmail.com', 43),
(2133901, 'Ragandap', 'Jan Michael', 'BSIT 4', '09334711330', 'janxmichael1608@gmail.com', 53),
(2133981, 'Soledad', 'Genie', 'BSIT 4', '09972949283', 'geniesoledad112295@gmail.com', 53),
(2135009, 'Bacwoden', 'Rryhana Shaye G.', 'BSIT 4', '09107871958', 'rrhybacwaden@gmail.com', 45),
(2135211, 'Sam', 'Paul Christian C.', 'BSIT 3', '09051440423', 'paulchristiansam@gmail.com', 37),
(2135293, 'Manzano', 'Jayson Garcia', 'BSIT 4', '09174178392', 'jmanzano0896@gmail.com', 44),
(2136158, 'Bernal', 'Richard Den', 'BSIT 4', '09771765997', 'bernal.chad@gmail.com', 57),
(2136469, 'Pelwigan', 'Darryl', 'BSIT 4', '09070880610', 'pdarrylgalyong@gmail.com', 2),
(2136625, 'Paredes', 'Diodatus', 'BSIT 4', '09065042640', 'thunderblaze2010@gmail.com', 26),
(2136933, 'Bumidang', 'Luke', 'BSIT 4', '09357186906', 'jbacosta749@gmail.com', 44),
(2140097, 'Santos', 'Chrstopher', 'BSIT 3', '09179262670', '2140097@slu.edu.ph', 10),
(2140198, 'Cachero', 'Jean Louis', 'BSIT 4', '09952764399', 'jeanlouis1151@gmail.com', 52),
(2140366, 'Dagang', 'Sean Arvin', 'BSIT 4', NULL, NULL, 38),
(2140426, 'Sano-an', 'Emilion', 'BSIT 4', '09493525942', '2140426@slu.edu.ph', 2),
(2140556, 'Ugaldo', 'Jovi Rose E.', 'BSCS 4', '09091543610', 'joviroseugaldo@gmail.com', 23),
(2142377, 'Edades', 'Olizar Bryn', 'BSIT 4', '09262678198', 'bryn.edades@gmail.com', 38),
(2142825, 'Tolentino', 'Bianca Fleur', 'BSIT 4', '09367735284', 'tolentino_biancafleur@yahoo.com', 55),
(2143766, 'Uy', 'Michael Vincent', 'BSCS 4', '09399286021', 'michaeluy@gmail.com', 43),
(2143782, 'Quezada', 'Paul Ian', 'BSIT 3', '09465508896', '2143782@slu.edu.ph', 34),
(2143836, 'Lalas', 'Lucky Christian', 'BSIT 4', '09272993633', 'miyahira.christian@gmail.com', 56),
(2143871, 'Aquino', 'Raja Mecca', 'BSIT 3', '09553400512', 'rajaa.aquino@gmail.com', 8),
(2144062, 'Quiambao', 'Ryan Christopher R.', 'BSIT 3', '09565596266', '2144062@slu.edu.ph', 8),
(2144190, 'Hirai', 'Erika Mae C.', 'BSIT 3', '09158964178', '2144190@slu.edu.ph', 17),
(2144273, 'Cogasi', 'Swira Claire L.', 'BSIT 3', '09951451756', 'cswiraclaire@gmail.com', 10),
(2144690, 'Abad', 'Mark Joseph', 'BSIT 4', '09152856391', '2144690@slu.edu.ph', 10),
(2144780, 'Beltran', 'Christian', 'BSIT 3', '09152710190', '2144780@slu.edu.ph', 55),
(2145098, 'Estacio', 'Lemuel', 'BSIT 3', '09159428736', 'estacio.lemuel@gmail.com', 55),
(2145473, 'Bitmead', 'Steven Gregory', 'BSIT 4', '09283484843', 'bitmeadsteven@gmail.com', 2),
(2146153, 'Francisco', 'Timothy Redd', 'BSIT 3', '09161403309', 't.reddfrancisco@gmail.com', 42),
(2146163, 'Amos', 'Resilyn C.', 'BSIT 3', '09482134252', 'resilyn.ra@gmail.com', 48),
(2146624, 'Alinso', 'Ian', 'BSIT 3', '09098080680', 'yanzkytootsky@gmail.com', 10),
(2146986, 'Belino', 'Alysson', 'BSIT 4', '09778253744', 'belinoalysson@gmail.com', 48),
(2147643, 'Festejo', 'Leo Dominique Angelo M.', 'BSCS 3', '09206251553', 'leofestejo@gmail.com', 23),
(2147790, 'Arzadon', 'CD Mae D.', 'BSIT 3', '09062545652', '2147790@slu.edu.ph', 20),
(2147840, 'Dela Pena', 'Adriana Jenar', 'BSIT 3', '09557020307', 'ajdp927@gmail.com', 33),
(2150048, 'Testado', 'Janriel G.', 'BSIT 3', '09083046060', 'testado.janriel@gmail.com', 31),
(2150084, 'Zheng', 'Mary Jane (Wen Ya) Q.', 'BSIT 3', '09771982259', '2150084@slu.edu.ph', 5),
(2150278, 'Sayco', 'Ma. Danavie', 'BSIT 3', '09997714840', 'dnvsayco@gmail.com', 42),
(2150300, 'Redondo', 'James Patrick O.', 'BSIT 3', '09357771603', 'jmspredondo@gmail.com', 47),
(2150387, 'Fernandez', 'Alainne', 'BSCS 3', '09771059696', 'fernandezalainne@gmail.com', 22),
(2150428, 'Fama', 'Charlene T.', 'BSIT 3', '09268549704', '2150428@slu.edu.ph', 5),
(2150485, 'Castro', 'Marian Roane B.', 'BSIT 3', '09276418951', '2150485@slu.edu.ph', 9),
(2150506, 'Laban', 'Joshua N.', 'BSIT 3', '09087821365', '2150506@slu.edu.ph', 5),
(2150509, 'Donglawen', 'Dean Earl O.', 'BSIT 3', '09393711020', 'deanfailed@gmail.com', 31),
(2150521, 'Dasmarinas', 'Walter Angelo', 'BSIT 3', '09956431154', 'walterangelo@gmail.com', 39),
(2150536, 'Del Rosario', 'Jerome D.', 'BSCS 3', '09153478922', '2150536@slu.edu.ph', 15),
(2150792, 'Saringan', 'Danielle Shaerene R.', 'BSIT 3', '09324736421', 'danielleshaerene@gmail.com', 21),
(2150822, 'Dicen', 'Shania Isabelle H.', 'BSCS 3', '09959957372', 'shaniadicen@gmail.com', 1),
(2150834, 'Yu', 'Rommel Justin', 'BSIT 3', '09553171650', 'rommelyu750@gmail.com', 32),
(2150854, 'Malones', 'David Benedict', 'BSIT 3', '09164571093', 'david012098@gmail.com', 46),
(2150936, 'Jimenez', 'Zebedee V.', 'BSCS 3', '09175080254', '2150936@slu.edu.ph', 19),
(2150942, 'Mondiguing', 'Ali Brian V.', 'BSCS 3', '09184823559', '2150942@slu.edu.ph', 13),
(2150964, 'Ocampo', 'Jessie James', 'BSIT 3', '09355010658', '2150964@slu.edu.ph', 20),
(2150989, 'Aspiras', 'Adrian John A.', 'BSCS 3', '09158652108', '2150989@slu.edu.ph', 13),
(2151084, 'Carantes', 'Ethnica Jayao', 'BSCS 3', '09158137110', 'carantesethnica@gmail.com', 22),
(2151128, 'David', 'Josepablo Jr. E.', 'BSCS 3', '09158699162', '2151128@slu.edu.ph', 19),
(2151211, 'Caballar', 'Randall Elijah', 'BSIT 3', '09176800658', '2151211@slu.edu.ph', 22),
(2151220, 'Viray', 'Froilan Mark', 'BSIT 3', '09561282968', 'f.markviray18@gmail.com', 11),
(2151252, 'Guieb', 'Rey Meljohn S.', 'BSIT 3', '09277185206', 'reymeljohnguieb22@gmail.com', 31),
(2151287, 'Bangui', 'Heinrich', 'BSIT 3', '09196840747', 'heinrichbangui@gmail.com', 14),
(2151305, 'Mauri', 'Diane Kaye', 'BSIT 3', '09759063957', 'kayemauri@gmail.com', 34),
(2151355, 'Lagunilla', 'Kenneth O.', 'BSIT 3', '09487907421', 'kennethlagunilla44@gmail.com', 31),
(2151386, 'Viloria', 'Kristine Mae', 'BSIT 3', '09951032417', '2151386@slu.edu.ph', 50),
(2151401, 'Licud', 'Ronald C.', 'BSIT 3', '09164151960', 'rlicud7@gmail.com', 39),
(2151434, 'Añonuevo', 'James R.', 'BSIT 3', '09276546959', '2151434@slu.edu.ph', 54),
(2151445, 'Miranda', 'Janina Valerie B.', 'BSIT 3', '09993702753', 'mirandajaninavalerie@gmail.com', 7),
(2151524, 'Pagaduan', 'Sherene Joyce', 'BSIT 3', '09778219050', 'shenmp13@gmail.com', 39),
(2151666, 'Andawi', 'Mark Jr.', 'BSIT 3', '09952351069', 'markandawi@gmail.com', 14),
(2151688, 'Manantan', 'John Carlo', 'BSCS 3', '09062557565', 'johncarlomanantan@gmail.com', 22),
(2151698, 'Marcelo', 'Aira Joy', 'BSIT 3', '09065790143', 'airamarcelo@gmail.com', 39),
(2151727, 'Ramirez', 'Emari Sandra S.', 'BSIT 3', '09059322599', '2151727@slu.edu.ph', 29),
(2151796, 'Garcia', 'Jay B.', 'BSIT 3', '09263405206', '2151796@slu.edu.ph', 5),
(2151828, 'Erese', 'Erico Alfonz S.', 'BSCS 3', '09165755144', '2151828@slu.edu.ph', 41),
(2151837, 'Cabanban', 'Eldridge', 'BSIT 3', NULL, NULL, 18),
(2151848, 'Araos', 'Angelo Austin', 'BSIT 3', '09053680799', '2151848@slu.edu.ph', 32),
(2151890, 'Soy', 'Tyrone Joshua', 'BSIT 3', '09357946065', 'soy.tyrone@gmail.com', 34),
(2152009, 'Mina', 'Apollo Joshua', 'BSIT 3', '09154800448', 'apollomina1@gmail.com', 51),
(2152015, 'Viloria', 'Dixon Aldwin O.', 'BSIT 3', '09052296579', '2152015@slu.edu.ph', 5),
(2152028, 'Leonardo', 'Vironica M.', 'BSIT 3', '09168956234', 'vironicaleonardo@gmail.com', 12),
(2152056, 'Cabantac', 'Emmanuel Alfonso B.', 'BSIT 3', '09758628947', '2152056@slu.edu.ph', 31),
(2152110, 'Dy', 'Jamaica Marie T.', 'BSIT 3', '09065957741', 'jmdy111397@gmail.com', 32),
(2152127, 'Geraldez', 'Maureen Serote', 'BSIT 3', '09167747700', 'geraldezmau@gmail.com', 42),
(2152142, 'Dadula', 'Jason Paul M.', 'BSCS 3', '09957635322', '2152142@slu.edu.ph', 15),
(2152176, 'Cabalse', 'Ariane Faye E.', 'BSIT 3', '09954875955', '2152176@slu.edu.ph', 51),
(2152181, 'Taccayan', 'Danzel', 'BSIT 3', '09061728207', 'taccayandanzel@gmail.com', 22),
(2152195, 'Gagelonia', 'Jenmar R.', 'BSIT 3', '09278746586', '2152195@slu.edu.ph', 5),
(2152201, 'Bayote', 'Rusell', 'BSIT 3', '09164146533', 'rusellbayote@gmail.com', 14),
(2152214, 'Malicdem', 'Leo', 'BSIT 3', '09568515595', '2152214@slu.edu.ph', 18),
(2152242, 'Gonzales', 'Jepanee Abishei T.', 'BSIT 3', '09307098602', 'jepanee.abishei@gmail.com', 16),
(2152281, 'Calpito', 'Maureen Nicole', 'BSIT 3', '09491790004', 'maureenicolecalpito17@gmail.com', 12),
(2152333, 'Malabanan', 'Coleen Gabrielle M.', 'BSIT 3', '09951065399', 'gabmapalo@gmail.com', 29),
(2152430, 'Dela Rosa', 'Mon Joel C.', 'BSIT 3', '09178404967', '2152430@slu.edu.ph', 3),
(2152544, 'Arbolente', 'Kathleen Dianne A.', 'BSIT 3', '09153821592', '2152544@slu.edu.ph', 51),
(2152557, 'Argao', 'Joneil S.', 'BSIT 3', '09395525668', 'joneilargao.ja@gmail.com', 6),
(2152573, 'Castillo', 'Mark Ryan B.', 'BSIT 3', '09367493763', 'markryanc23@gmail.com', 14),
(2152598, 'Culbengan', 'Denver P.', 'BSIT 3', '09154208813', 'crimelight24@gmail.com', 37),
(2152813, 'Cayabyab', 'Dianne Alyza', 'BSIT 3', '09309421945', 'diannecayabyab@gmail.com', 28),
(2152826, 'Marfil', 'Yuki', 'BSIT 3', '09260023117', '2152826@slu.edu.ph', 22),
(2152834, 'Centino', 'Sarah Mae E.', 'BSIT 3', '09109290518', '2152824@slu.edu.ph', 37),
(2152844, 'Dalayoan', 'Clint Deric', 'BSIT 3', '09958167067', 'cdalayoan98@gmail.com', 22),
(2152873, 'Mones', 'Angelica R.', 'BSCS 3', '09952202765', '2152873@slu.edu.ph', 23),
(2153020, 'Bernardez', 'Marileus', 'BSIT 3', '09260086355', 'marileusbernardez@gmail.com', 38),
(2153094, 'Turqueza', 'Katherine A.', 'BSIT 3', '09352900979', 'turquezakath@gmail.com', 6),
(2153118, 'Fernandez', 'Mariella', 'BSIT 3', '09174131225', '2153118@slu.edu.ph', 18),
(2153202, 'Dumdum', 'Ma. Jasiel Faye', 'BSIT 3', '09988538924', '2153202@slu.edu.ph', 51),
(2153240, 'Alcaide', 'Arvince Neil A.', 'BSIT 3', '09202973256', 'alcaidearvince@gmail.com', 21),
(2153271, 'Dullao', 'Jeanne C.', 'BSIT 3', '09058075550', '2153270@slu.edu.ph', 5),
(2153357, 'Valdez', 'Raphael M.', 'BSIT 3', '09366381495', 'raphaelmoa12@gmail.com', 3),
(2153455, 'Zipagan', 'Jerome N.', 'BSIT 3', '09506777313', '2153455@slu.edu.ph', 5),
(2153674, 'Leonen', 'Aerhielle Cassandra', 'BSIT 3', '09056010355', '2153674@slu.edu.ph', 37),
(2153777, 'Luna', 'Jaryd Reeve', 'BSIT 3', '09196166720', 'jarydluna28@gmail.com', 34),
(2153781, 'Bigornia', 'Krizzhia', 'BSIT 3', '09951481710', 'kc.bigornia@gmail.com', 32),
(2153797, 'De Guzman', 'Ryan Christian', 'BSIT 3', '09064763486', '2153797@slu.edu.ph', 37),
(2153820, 'Delos Santos', 'Juan Miguel', 'BSIT 3', '09565978035', '2153820@slu.edu.ph', 22),
(2153904, 'Dispo', 'Cyrene', 'BSIT 3', '09463544299', 'cyrenejanedispo132@gmail.com', 6),
(2153948, 'Suarez', 'Benedict', 'BSIT 3', '09064763492', '2153948@slu.edu.ph', 37),
(2153974, 'Maslian', 'Averey Del-isen', 'BSIT 3', '09486808965', '2153974@slu.edu.ph', 18),
(2154144, 'Ocado', 'Jennelyn N.', 'BSIT 3', '09774263008', 'jennocado@gmail.com', 7),
(2154183, 'Manzon', 'Jake James', 'BSIT 3', '09104008500', 'manzonjake15@gmail.com', 30),
(2154189, 'Abalos', 'Joshua James', 'BSIT 3', '09171332858', '2154189@slu.edu.ph', 30),
(2154223, 'Jaramel', 'Kenneth Domenden', 'BSIT 3', '09305659133', 'kennethjaramel@gmail.com', 30),
(2154225, 'Torres', 'Princess Janyl', 'BSIT 3', '09332831555', 'princess.janyl.19@gmail.com', 34),
(2154269, 'Romero', 'Caesar Jim V.', 'BSIT 3', '09976142095', 'caesarromero1805@gmail.com', 11),
(2154291, 'Cabilar', 'Nonito Jr.', 'BSIT 3', '09098911000', 'nonitocabilar@gmail.com', 30),
(2154375, 'Prades', 'Jamina Jasren S.', 'BSIT 3', '09277783935', '2154375@slu.edu.ph', 51),
(2154396, 'Benitez', 'Jinci Clyde', 'BSIT 3', '09260976790', 'jclydebenitez@gmail.com', 34),
(2154439, 'Marinas', 'Phebe Chris', 'BSIT 3', '09282670578', 'phebecris@yahoo.com', 34),
(2154585, 'Garcia', 'Zsarlene Alyza', 'BSIT 3', '09064770252', 'zsarlenealyza@gmail.com', 12),
(2154810, 'Bravo', 'Ma. Micaela P.', 'BSIT 3', NULL, '2154810@slu.edu.ph', 52),
(2154904, 'Pulido', 'Jessa Camille E.', 'BSIT 3', '09773382909', 'jessacamille.jc@gmail.com', 21),
(2155651, 'Caguioa', 'Ma. Christine', 'BSIT 3', '09269044317', '2155651@slu.edu.ph', 5),
(2155703, 'Lopez', 'Ramon I.', 'BSIT 3', '09162783918', '2155703@slu.edu.ph', 8),
(2155757, 'Leones', 'Alfa Leizel', 'BSIT 3', '09089651798', 'alfaleones199@gmail.com', 34),
(2155789, 'De Alban', 'Kristine Jorgia', 'BSIT 3', '09166256814', '2155789@slu.edu.ph', 18),
(2155825, 'Sarmiento', 'Franchesca Miguelle R.', 'BSCS 3', '09994336485', '2155825@slu.edu.ph', 13),
(2155912, 'Ragay', 'Claudine Joy P.', 'BSIT 3', '09063593252', '2155912@slu.edu.ph', 5),
(2155957, 'Langit', 'Ismael Cruz', 'BSIT 3', '09151046069', 'ismaelcruzlangit@gmail.com', 51),
(2156068, 'Canaria', 'Patricia Anne', 'BSCS 3', '09269545636', 'canariapatriciaanne@gmail.com', 40),
(2156157, 'Antero', 'Randy Ezekiel Jr.', 'BSIT 3', '09062070025', 'anterorandy@gmail.com', 30),
(2156164, 'Basco', 'John Allen', 'BSIT 3', '09152893946', 'allenbascoo@gmail.com', 51),
(2156179, 'Bobadilla', 'Karl Genesis P.', 'BSIT 3', '09062733646', '2156179@slu.edu.ph', 5),
(2156233, 'Wooden', 'Delson Markis A.', 'BSIT 3', '09092282423', '2156233@slu.edu.ph', 5),
(2156523, 'Pagayonan', 'Elijah C.', 'BSIT 3', '09073796194', 'pagayonaneli@gmail.com', 42),
(2156749, 'Diaz', 'Stephen Paul', 'BSIT 3', '09478776726', 'stephendiaz263@gmail.com', 34),
(2157015, 'Sanchez', 'Daiben Angelo A.', 'BSIT 3', '09568193381', 'daibenangelosanchez@gmail.com', 37),
(2157588, 'Ravino', 'Jacob', 'BSIT 3', '09073216930', 'onivarjj@gmail.com', 31),
(2158841, 'Lopez', 'Samantha Marie', 'BSCS 3', '09175889848', 'samlopez92595@gmail.com', 24),
(2159296, 'Radie', 'Patricia Mae', 'BSIT 3', NULL, '2159296@slu.edu.ph', 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `company_id_idx` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
