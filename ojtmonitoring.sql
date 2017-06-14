-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 06:41 AM
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
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `coid` int(11) NOT NULL,
  `coname` varchar(100) NOT NULL,
  `coaddress` varchar(300) NOT NULL,
  `company_head` varchar(60) NOT NULL,
  `position` varchar(300) DEFAULT NULL,
  `typeofojt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`coid`, `coname`, `coaddress`, `company_head`, `position`, `typeofojt`) VALUES
(1, 'Texas Instruments', 'PEZA Loakan, Baguio City 2600', 'Manie Mendoza', 'Recuritment Manager', 'Company-based'),
(2, 'Docpro Business Solutions', 'Mezzanine Floor, CYA Centrum, Military Cut-Off', 'Rudy Clemente Jr.', 'Senior Partner', 'Company-based'),
(3, 'Linkage', 'Quezon Hill Road 1, Calle Uno', 'Cristina Chua', 'Trainee', 'Company-based'),
(4, 'National Grid Corporation Of The Philippines', 'Poro Point, San Fernando City, La Union', 'Jesus Belonso', 'HR Manager/HR Division of NGCP', 'Company-based'),
(5, 'Philippine Military Academy', 'Fort Del Pilar, Loakan Road, 2600 Benguet', 'Maria Monica C. Costales, PhD', 'Supervising Admin Officer (HRMO IV) Chief Civilian Personnel Affairs, OMA1', 'Company-based'),
(6, 'ITCert Training Solutions', 'G/F SAJJ Building, Rimando Road, Baguio City', 'Lou Philip Beltran', 'Headmaster/CEO', 'Company-based'),
(7, 'Noble Trends Unbound, Inc', 'The Norwegian Collection Inc Bldg, Baguio Economic Zone, Loakan Rd, Baguio City', 'Mary Salome Lea B. Licudine', 'HR Manager', 'Company-based'),
(8, 'MOOG Controls Corporation', 'Loakan Road, Baguio City', 'Rayah Sarile', 'HR Head', 'Company-based'),
(9, 'Chungdahm International', 'RSVP Building, 4 First Road, Quezon Hill, Baguio City', 'Benigno Rosalino D. Cariaga', 'Operations Manager', 'Company-based'),
(10, 'Benguet Provincial Capitol', 'Halsema Highway, La Trinidad, Benguet', 'Gov. Cresencio C. Pacalso', 'Governor', 'Company-based'),
(11, 'Coca-Cola FEMSA Bottlers Bottlers Philippines Inc.', 'Bued, Calasiao, Pangasinan', 'Michael D. Fabroa', 'HR Executive', 'Company-based'),
(12, 'SITEL', 'PEZA Loakan, Baguio City 2600', 'Lou Philip Beltran', 'Network Engineer', 'Company-based'),
(13, 'Philippine Long Distance Telephone Company (PLDT)', 'Baguio City', 'John Gerald S. Marasigan', 'Senor Manager', 'Company-based'),
(14, 'Baguio City Hall', 'City Hall Drive, Baguio City', 'Atty. Leticia O. Clemente', 'City Budget Officer', 'Company-based'),
(15, 'Utalk Tutorial Services', '#11 First Road, Quezon Hill, Baguio City', 'Norraine M. Dadula', 'Senior Operations Manager', 'Company-based'),
(16, 'Office of the City Councilor', 'City Hall, City Hall Drive, Baguio City', 'Leandro B. Yangot Jr.', 'City Councilor', 'Company-based'),
(17, 'Labrador Munincipal Hall, Accounting Office', 'Labrador Munincipal Hall, Poblacion Labrador, Pangasinan', 'Fern Ann S. Zambrano', 'Municipal Accountant', 'Company-based'),
(18, 'Philippine Statistics Authority, CAR', '141 Abanao Extension, Baguio City 2600', 'Villafe P. Alibuyog', 'Regional Director', 'Company-based'),
(19, 'Metphil Medical Company', '3F Insular Life Building, Abanao Extension, Baguio City', 'Ivy D. Gayon', 'HR Manager', 'Company-based'),
(20, 'Department of Information and Communications Technology', 'Polo Field, Pacdal, Baguio City', 'William Rojas', 'Director II', 'Company-based'),
(21, 'Department of Interior and Local Government', '125 North Drive, Baguio City, Benguet', 'Engr. Marlo L. Iringan', 'Regional Director, DILG CAR', 'Company-based'),
(22, 'ITech-PFS Technology Inc.', 'Unit 3 D West Burnham Place', 'Sharon Q. Dalang', 'Branch Manager', 'Company-based'),
(23, 'Department of Agrarian Reform (CAR) ', '#39 M. Roxas St. Trancoville, Tabora Barangay, Baguio City', 'Atty. Marjorie P. Ayson', 'Regional Director', 'Company-based'),
(24, 'Department of Education (Baguio City Division)', '#82 Military Cut-Off, Baguio City', 'Olivia Gomez', 'Planning Officer III', 'Company-based'),
(25, 'Gottes Segen Language Tutorial Center', 'Rm. A4, Juniper Building, Bonifacio Street, Baguio City', 'Alpha Mae Pacio', 'School Director', 'Company-based'),
(26, 'GMS Technology', '3F La Brea Inn, Lower Session Road, Baguio City', 'Arch. Gueliro M. Sugano', 'Director', 'Company-based'),
(27, 'School of Computing and Information Sciences (SCIS), Saint Louis University', '3rd Floor, Silang Building, Saint Louis University', 'Dr. Cecillia A. Mercado', 'School Dean', 'In-house'),
(28, 'PhilHealth', 'Leonard Wood, Baguio City', 'Atty. Jerry F. Ibay', 'Resional Vice President', 'Company-based'),
(29, 'Philippine Scandanavian IT Solutions', '339 G A Yupangco Bldg. Sen. Gil Puyat, Makati City', 'Rachel Christensen', 'Director', 'Company-based'),
(30, 'Baguio-Benguet Community Credit Cooperative', '#56 Cooperative Street, Assumption Road, Baguio City', 'Mary Ann B. Bungag', 'Manager', 'Company-based'),
(31, 'Post Ad Ventures Inc.', '599 Pina Avenue, Sta. Mesa, Manila', 'Flor Hardin', 'Database Manager', 'Company-based'),
(32, 'Syner G Outsourcing', '#2 Lower Ground Floor, Roman Ayson Road, Cresencia Village, Baguio City', 'Joseph Opis Alisisto', 'Section Head', 'Company-based'),
(33, 'Incubix Technologies Inc. ', '28th Floor Wideout Office Pacific Star Bldg. Sen Gil Puyat Avenue, Corner Makati Avenue, Makati Avenue, Makati City', 'Carmela Baronda', 'HR Manager, Executive Assistant', 'Company-based'),
(34, 'Magnetite Branch, Pru Life UK', '3/F DBP Building, Lower Session Road, Baguio City', 'Myrna Lazo Solimen', 'Branch Manager', 'Company-based'),
(35, 'ICT Department, DepEd Division Ofice, Baguio City', '#82 Military Cut-off Road, Baguio City, Benguet', 'Harris G. Dizon', 'IT Department Head and Officer', 'Company-based'),
(36, 'Department of Environment and Natural Resources (CAR Division)', 'DENR Compound, Pacdal, Baguio City', 'Engr. Ralph C. Pablo', 'Regional Director ', 'Company-based'),
(37, 'Convergys', 'Ayalaland Technohub, John Hay Special Economic Zone', 'Ma. Faye Castillo', 'Recruitment Manager', 'Company-based'),
(38, 'Calle Uno Coworking Space: Virtuo Research Inc.', '#3 Josefa Llanes Escoda St. First Road, Quezon Hill, Baguio City', 'Melanie Racela', 'Supervisor/Head of Research', 'Company-based'),
(39, 'Alta Philippines IT Solutions and Web Page Design Inc.', '16F N3 Burgundy Corporate Tower, 152 Sen. Gil Puyat, Makati City', 'Edwin Cdwaling Jr.', 'HR Director', 'Company-based'),
(40, '8Layer Technologies, Inc.', 'Unit 503 Seven East Capitol Bldg.#7 East Capitol Drive, Corner Sta. Rosa Street', 'Jeanniel Ilago', 'HR Manager', 'Company-based'),
(41, 'On Semiconductor Manufacturing Philippines', 'Luisita Industrial Park, San Miguel, Tarlac City', 'Beth Pajaro', 'Human Resource Staff', 'Company-based'),
(42, 'Trend Micro', '8th Floor Tower 2, The Rockwell Buisiness Center, Ortigas Avenue, Pasig City, 1600', 'Joanna Aguinaldo', 'HR Manager, Requirement and Business Partner', 'Company-based'),
(43, 'Sutherland', 'Ground Floor Luke Foundation Building, 90 Leonard Wood Road, Corner Cabinet Hill', 'Patricia Jeff Garcia-Damasco', 'Resource Specialist', 'Company-based'),
(44, 'Acestar Solutions and Trading Inc.', 'PEZA Bldg/ Loakan, Baguio City', 'Folly Samson', 'Manager', 'Company-based'),
(45, 'HR Department', 'John Hay Management Corporation, Camp John Hay, Baguio City', 'Danny B. Latawan', 'HR Manager', 'Company-based'),
(46, 'Sycip Gorres Velayo & Co, Memeber Firm of Ernst and Young Global', '6760 Ayala Avenue, Makati, 1226', 'Warren R. Bituin', 'Partner', 'Company-based'),
(47, 'AKTUS Global Mgmt. Inc', 'Unit 2005 C, 20/F West Tower, PSC, Tektite Bldg, Ortigas, Pasig City', 'Esteven D. Fulgar', 'POT Head', 'Company-based'),
(48, 'Saint Louis University EISSIF', 'CCA Room C016, Saint Louis University', 'Edmund B. Benaurdez', 'Director', 'In-house'),
(49, 'National Telecommunications Commission', 'Leonard Wood Road, Baguio City, Benguet', 'Engr. Dante M. Vengua', 'Officer-In-Charge ', 'Company-based'),
(50, 'Manulife', '2F ES Clemente Building Shanum St. Cor. Otek St. Corner Lake Drive, Burnham Park, Baguio City', 'Joey M. Mejia', 'Unit Head - Polaris Jaguar Unit', 'Company-based'),
(51, 'IT/CS Department, SCIS', '3rd Floor, Silang Building, Saint Louis University', 'Ma. Concepcion Clemente', 'Department Head', 'In-house'),
(52, 'Information and Communications Technology Research Laboratory', '3rd Floor, Silang Building, Saint Louis University', 'Carlos Ben Montes', 'Officer-in-Charge', 'In-house'),
(53, 'Device Dynamics Asia', 'LGF The Norwegian Building, PEZA, Loakan Road, Camp John Hay, Baguio City', 'Shirley Joyy L. Cabrol', 'Human Resource Supervisor', 'Company-based'),
(54, 'Accent Micro Technologies Incorporated', '8/F East Tower, Philippine Stock Exchange Ortigas Center, Pasig City 1605 ', 'Imna Rizza Abiera', 'Recruitment Offiver', 'Company-based'),
(55, 'OIC Academic, Government and Community Partnership - Baguio', 'Loakan Road, Baguio City', 'Maria Lourdes Sison', 'Learning Specialist', 'Company-based'),
(56, 'Department of Social Welfare and Development', '#40 North Drive, Baguio City', 'Bonafe Ramos-Boado', 'Training Specialist 1', 'Company-based'),
(57, 'Commission on Elections ', 'Gov. Pack Road, Baguio City', 'Atty. John Paul A. Martin', 'Election Officer', 'Company-based');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idnum` int(11) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `first_name` varchar(35) DEFAULT NULL,
  `courseyear` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `evaluation` varchar(10) NOT NULL DEFAULT 'no',
  `endorsement` varchar(10) NOT NULL DEFAULT 'no',
  `waiver` varchar(10) NOT NULL DEFAULT 'no',
  `moa` varchar(10) NOT NULL DEFAULT 'no',
  `status` varchar(25) NOT NULL DEFAULT 'Incomplete',
  `coid` int(11) DEFAULT NULL,
  `date_started` date NOT NULL DEFAULT '2017-06-05'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idnum`, `last_name`, `first_name`, `courseyear`, `mobile_number`, `email`, `evaluation`, `endorsement`, `waiver`, `moa`, `status`, `coid`, `date_started`) VALUES
(323, 'AAAAAAA', 'AAAAAAA', 'BSIT-3', '3434', 'AAAAA@gmail.com', 'yes', 'yes', 'no', 'no', 'Incomplete', 40, '2017-06-05'),
(2107368, 'Obena', 'Jason', 'BSIT 4', '09390105758', 'obenajason@gmail.com', 'yes', 'yes', 'yes', 'no', 'Complete', 2, '2017-06-05'),
(2108867, 'Afsarikashi', 'Mehdi', 'BSIT 4', '09062658383', 'ix56@yahoo.com', 'no', 'no', 'no', 'no', 'Incomplete', 24, '2017-06-05'),
(2115153, 'Criste', 'Princess Marie Rose', 'BSIT 4', '09156764014', 'cescriste@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 8, '2017-06-05'),
(2117919, 'Belocura', 'Lairde Vincent', 'BSIT 4', '09353146797', 'lairde29@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 49, '2017-06-05'),
(2120329, 'Rull', 'Alexandria', 'BSIT 4', '09772570566', NULL, 'no', 'no', 'no', 'no', 'Incomplete', 56, '2017-06-05'),
(2121920, 'Espiritu', 'Christopher Edrian L.', 'BSIT 3', '09750081447', '2121920@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2122831, 'Salazar', 'Jean Michael', 'BSIT 4', '09770862591', 'jmsalazar0111@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 49, '2017-06-05'),
(2123700, 'Oydoc', 'Raya Marie J.', 'BSIT 4', '09465201245', 'rayaoydoc@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 24, '2017-06-05'),
(2123961, 'Aberin', 'Alvin Jan', 'BSCS 4', '09151303051', 'alvinaberin@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 43, '2017-06-05'),
(2124586, 'Apostol', 'Shirlene', 'BSIT 4', '09565596293', 'shirleneapostol008@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 2, '2017-06-05'),
(2125185, 'Orian', 'John Kevin', 'BSIT 4', '09999014045', 'kevin.orian@yahoo.com', 'no', 'no', 'no', 'no', 'Incomplete', 35, '2017-06-05'),
(2125241, 'Ishii', 'Satoyoshi', 'BSIT 4', '09207116402', 'ishiisatoyoshi@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 38, '2017-06-05'),
(2126126, 'Barbuco', 'Christian Aris', 'BSIT 3', '09062620907', 'ArisBarbuco@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 38, '2017-06-05'),
(2127538, 'Rai', 'Michael Angelo', 'BSIT 4', '09260827646', 'michaelangelorai@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 56, '2017-06-05'),
(2130240, 'Tomines', 'Steven Michael', 'BSIT 3', '09773038070', 'Tomines.Steven@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 2, '2017-06-05'),
(2130906, 'Marquez', 'Jorge Clarence', 'BSCS 4', '09301781349', 'jorgeclarence007@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 43, '2017-06-05'),
(2131506, 'Julhusin', 'Jomari', 'BSIT 3', '09365886378', '2131506@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 32, '2017-06-05'),
(2132368, 'Opiniano', 'Kieth Christian R.', 'BSIT 4', '09989971496', 'kiethopiniano21@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 36, '2017-06-05'),
(2132852, 'Nuezca', 'Jorge Kenneth', 'BSIT 4', NULL, 'nuezcajorge@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2133376, 'De Guzman', 'Jay Esmane', 'BSIT 4', '09051425944', 'jayyydeguzman@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 53, '2017-06-05'),
(2133513, 'Cayago', 'Zam', 'BSCS 4', '09167791813', 'zcayago@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 43, '2017-06-05'),
(2133901, 'Ragandap', 'Jan Michael', 'BSIT 4', '09334711330', 'janxmichael1608@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 53, '2017-06-05'),
(2133981, 'Soledad', 'Genie', 'BSIT 4', '09972949283', 'geniesoledad112295@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 53, '2017-06-05'),
(2135009, 'Bacwoden', 'Rryhana Shaye G.', 'BSIT 4', '09107871958', 'rrhybacwaden@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 45, '2017-06-05'),
(2135211, 'Sam', 'Paul Christian C.', 'BSIT 3', '09051440423', 'paulchristiansam@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2135293, 'Manzano', 'Jayson Garcia', 'BSIT 4', '09174178392', 'jmanzano0896@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 44, '2017-06-05'),
(2136158, 'Bernal', 'Richard Den', 'BSIT 4', '09771765997', 'bernal.chad@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 57, '2017-06-05'),
(2136469, 'Pelwigan', 'Darryl', 'BSIT 4', '09070880610', 'pdarrylgalyong@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 2, '2017-06-05'),
(2136625, 'Paredes', 'Diodatus', 'BSIT 4', '09065042640', 'thunderblaze2010@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 26, '2017-06-05'),
(2136933, 'Bumidang', 'Luke', 'BSIT 4', '09357186906', 'jbacosta749@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 44, '2017-06-05'),
(2140097, 'Santos', 'Chrstopher', 'BSIT 3', '09179262670', '2140097@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 10, '2017-06-05'),
(2140198, 'Cachero', 'Jean Louis', 'BSIT 4', '09952764399', 'jeanlouis1151@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 52, '2017-06-05'),
(2140366, 'Dagang', 'Sean Arvin', 'BSIT 4', NULL, NULL, 'no', 'no', 'no', 'no', 'Incomplete', 38, '2017-06-05'),
(2140426, 'Sano-an', 'Emilion', 'BSIT 4', '09493525942', '2140426@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 2, '2017-06-05'),
(2140556, 'Ugaldo', 'Jovi Rose E.', 'BSCS 4', '09091543610', 'joviroseugaldo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 23, '2017-06-05'),
(2142377, 'Edades', 'Olizar Bryn', 'BSIT 4', '09262678198', 'bryn.edades@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 38, '2017-06-05'),
(2142825, 'Tolentino', 'Bianca Fleur', 'BSIT 4', '09367735284', 'tolentino_biancafleur@yahoo.com', 'no', 'no', 'no', 'no', 'Incomplete', 55, '2017-06-05'),
(2143766, 'Uy', 'Michael Vincent', 'BSCS 4', '09399286021', 'michaeluy@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 43, '2017-06-05'),
(2143782, 'Quezada', 'Paul Ian', 'BSIT 3', '09465508896', '2143782@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2143836, 'Lalas', 'Lucky Christian', 'BSIT 4', '09272993633', 'miyahira.christian@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 56, '2017-06-05'),
(2143871, 'Aquino', 'Raja Mecca', 'BSIT 3', '09553400512', 'rajaa.aquino@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 8, '2017-06-05'),
(2144062, 'Quiambao', 'Ryan Christopher R.', 'BSIT 3', '09565596266', '2144062@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 8, '2017-06-05'),
(2144190, 'Hirai', 'Erika Mae C.', 'BSIT 3', '09158964178', '2144190@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 17, '2017-06-05'),
(2144273, 'Cogasi', 'Swira Claire L.', 'BSIT 3', '09951451756', 'cswiraclaire@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 10, '2017-06-05'),
(2144690, 'Abad', 'Mark Joseph', 'BSIT 4', '09152856391', '2144690@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 10, '2017-06-05'),
(2144780, 'Beltran', 'Christian', 'BSIT 3', '09152710190', '2144780@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 55, '2017-06-05'),
(2145098, 'Estacio', 'Lemuel', 'BSIT 3', '09159428736', 'estacio.lemuel@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 55, '2017-06-05'),
(2145473, 'Bitmead', 'Steven Gregory', 'BSIT 4', '09283484843', 'bitmeadsteven@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 2, '2017-06-05'),
(2146153, 'Francisco', 'Timothy Redd', 'BSIT 3', '09161403309', 't.reddfrancisco@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 42, '2017-06-05'),
(2146163, 'Amos', 'Resilyn C.', 'BSIT 3', '09482134252', 'resilyn.ra@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 48, '2017-06-05'),
(2146624, 'Alinso', 'Ian', 'BSIT 3', '09098080680', 'yanzkytootsky@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 10, '2017-06-05'),
(2146986, 'Belino', 'Alysson', 'BSIT 4', '09778253744', 'belinoalysson@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 48, '2017-06-05'),
(2147643, 'Festejo', 'Leo Dominique Angelo M.', 'BSCS 3', '09206251553', 'leofestejo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 23, '2017-06-05'),
(2147790, 'Arzadon', 'CD Mae D.', 'BSIT 3', '09062545652', '2147790@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 20, '2017-06-05'),
(2147840, 'Dela Pena', 'Adriana Jenar', 'BSIT 3', '09557020307', 'ajdp927@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 33, '2017-06-05'),
(2150048, 'Testado', 'Janriel G.', 'BSIT 3', '09083046060', 'testado.janriel@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2150084, 'Zheng', 'Mary Jane (Wen Ya) Q.', 'BSIT 3', '09771982259', '2150084@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2150278, 'Sayco', 'Ma. Danavie', 'BSIT 3', '09997714840', 'dnvsayco@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 42, '2017-06-05'),
(2150300, 'Redondo', 'James Patrick O.', 'BSIT 3', '09357771603', 'jmspredondo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 47, '2017-06-05'),
(2150387, 'Fernandez', 'Alainne', 'BSCS 3', '09771059696', 'fernandezalainne@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2150428, 'Fama', 'Charlene T.', 'BSIT 3', '09268549704', '2150428@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2150485, 'Castro', 'Marian Roane B.', 'BSIT 3', '09276418951', '2150485@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 9, '2017-06-05'),
(2150506, 'Laban', 'Joshua N.', 'BSIT 3', '09087821365', '2150506@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2150509, 'Donglawen', 'Dean Earl O.', 'BSIT 3', '09393711020', 'deanfailed@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2150521, 'Dasmarinas', 'Walter Angelo', 'BSIT 3', '09956431154', 'walterangelo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 39, '2017-06-05'),
(2150536, 'Del Rosario', 'Jerome D.', 'BSCS 3', '09153478922', '2150536@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 15, '2017-06-05'),
(2150792, 'Saringan', 'Danielle Shaerene R.', 'BSIT 3', '09324736421', 'danielleshaerene@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 21, '2017-06-05'),
(2150822, 'Dicen', 'Shania Isabelle H.', 'BSCS 3', '09959957372', 'shaniadicen@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 1, '2017-06-05'),
(2150834, 'Yu', 'Rommel Justin', 'BSIT 3', '09553171650', 'rommelyu750@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 32, '2017-06-05'),
(2150854, 'Malones', 'David Benedict', 'BSIT 3', '09164571093', 'david012098@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 46, '2017-06-05'),
(2150936, 'Jimenez', 'Zebedee V.', 'BSCS 3', '09175080254', '2150936@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 19, '2017-06-05'),
(2150942, 'Mondiguing', 'Ali Brian V.', 'BSCS 3', '09184823559', '2150942@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 13, '2017-06-05'),
(2150964, 'Ocampo', 'Jessie James', 'BSIT 3', '09355010658', '2150964@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 20, '2017-06-05'),
(2150989, 'Aspiras', 'Adrian John A.', 'BSCS 3', '09158652108', '2150989@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 13, '2017-06-05'),
(2151084, 'Carantes', 'Ethnica Jayao', 'BSCS 3', '09158137110', 'carantesethnica@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2151128, 'David', 'Josepablo Jr. E.', 'BSCS 3', '09158699162', '2151128@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 19, '2017-06-05'),
(2151211, 'Caballar', 'Randall Elijah', 'BSIT 3', '09176800658', '2151211@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2151220, 'Viray', 'Froilan Mark', 'BSIT 3', '09561282968', 'f.markviray18@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 11, '2017-06-05'),
(2151252, 'Guieb', 'Rey Meljohn S.', 'BSIT 3', '09277185206', 'reymeljohnguieb22@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2151287, 'Bangui', 'Heinrich', 'BSIT 3', '09196840747', 'heinrichbangui@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 14, '2017-06-05'),
(2151305, 'Mauri', 'Diane Kaye', 'BSIT 3', '09759063957', 'kayemauri@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2151355, 'Lagunilla', 'Kenneth O.', 'BSIT 3', '09487907421', 'kennethlagunilla44@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2151386, 'Viloria', 'Kristine Mae', 'BSIT 3', '09951032417', '2151386@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 50, '2017-06-05'),
(2151401, 'Licud', 'Ronald C.', 'BSIT 3', '09164151960', 'rlicud7@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 39, '2017-06-05'),
(2151434, 'Añonuevo', 'James R.', 'BSIT 3', '09276546959', '2151434@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 54, '2017-06-05'),
(2151445, 'Miranda', 'Janina Valerie B.', 'BSIT 3', '09993702753', 'mirandajaninavalerie@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 7, '2017-06-05'),
(2151524, 'Pagaduan', 'Sherene Joyce', 'BSIT 3', '09778219050', 'shenmp13@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 39, '2017-06-05'),
(2151666, 'Andawi', 'Mark Jr.', 'BSIT 3', '09952351069', 'markandawi@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 14, '2017-06-05'),
(2151688, 'Manantan', 'John Carlo', 'BSCS 3', '09062557565', 'johncarlomanantan@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2151698, 'Marcelo', 'Aira Joy', 'BSIT 3', '09065790143', 'airamarcelo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 39, '2017-06-05'),
(2151727, 'Ramirez', 'Emari Sandra S.', 'BSIT 3', '09059322599', '2151727@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 29, '2017-06-05'),
(2151796, 'Garcia', 'Jay B.', 'BSIT 3', '09263405206', '2151796@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2151828, 'Erese', 'Erico Alfonz S.', 'BSCS 3', '09165755144', '2151828@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 41, '2017-06-05'),
(2151837, 'Cabanban', 'Eldridge', 'BSIT 3', NULL, NULL, 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2151848, 'Araos', 'Angelo Austin', 'BSIT 3', '09053680799', '2151848@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 32, '2017-06-05'),
(2151890, 'Soy', 'Tyrone Joshua', 'BSIT 3', '09357946065', 'soy.tyrone@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2152009, 'Mina', 'Apollo Joshua', 'BSIT 3', '09154800448', 'apollomina1@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2152015, 'Viloria', 'Dixon Aldwin O.', 'BSIT 3', '09052296579', '2152015@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2152028, 'Leonardo', 'Vironica M.', 'BSIT 3', '09168956234', 'vironicaleonardo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 12, '2017-06-05'),
(2152056, 'Cabantac', 'Emmanuel Alfonso B.', 'BSIT 3', '09758628947', '2152056@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2152110, 'Dy', 'Jamaica Marie T.', 'BSIT 3', '09065957741', 'jmdy111397@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 32, '2017-06-05'),
(2152127, 'Geraldez', 'Maureen Serote', 'BSIT 3', '09167747700', 'geraldezmau@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 42, '2017-06-05'),
(2152142, 'Dadula', 'Jason Paul M.', 'BSCS 3', '09957635322', '2152142@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 15, '2017-06-05'),
(2152176, 'Cabalse', 'Ariane Faye E.', 'BSIT 3', '09954875955', '2152176@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2152181, 'Taccayan', 'Danzel', 'BSIT 3', '09061728207', 'taccayandanzel@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2152195, 'Gagelonia', 'Jenmar R.', 'BSIT 3', '09278746586', '2152195@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2152201, 'Bayote', 'Rusell', 'BSIT 3', '09164146533', 'rusellbayote@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 14, '2017-06-05'),
(2152214, 'Malicdem', 'Leo', 'BSIT 3', '09568515595', '2152214@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2152242, 'Gonzales', 'Jepanee Abishei T.', 'BSIT 3', '09307098602', 'jepanee.abishei@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 16, '2017-06-05'),
(2152281, 'Calpito', 'Maureen Nicole', 'BSIT 3', '09491790004', 'maureenicolecalpito17@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 12, '2017-06-05'),
(2152333, 'Malabanan', 'Coleen Gabrielle M.', 'BSIT 3', '09951065399', 'gabmapalo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 29, '2017-06-05'),
(2152430, 'Dela Rosa', 'Mon Joel C.', 'BSIT 3', '09178404967', '2152430@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 3, '2017-06-05'),
(2152544, 'Arbolente', 'Kathleen Dianne A.', 'BSIT 3', '09153821592', '2152544@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2152557, 'Argao', 'Joneil S.', 'BSIT 3', '09395525668', 'joneilargao.ja@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 6, '2017-06-05'),
(2152573, 'Castillo', 'Mark Ryan B.', 'BSIT 3', '09367493763', 'markryanc23@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 14, '2017-06-05'),
(2152598, 'Culbengan', 'Denver P.', 'BSIT 3', '09154208813', 'crimelight24@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2152813, 'Cayabyab', 'Dianne Alyza', 'BSIT 3', '09309421945', 'diannecayabyab@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 28, '2017-06-05'),
(2152826, 'Marfil', 'Yuki', 'BSIT 3', '09260023117', '2152826@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2152834, 'Centino', 'Sarah Mae E.', 'BSIT 3', '09109290518', '2152824@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2152844, 'Dalayoan', 'Clint Deric', 'BSIT 3', '09958167067', 'cdalayoan98@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2152873, 'Mones', 'Angelica R.', 'BSCS 3', '09952202765', '2152873@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 23, '2017-06-05'),
(2153020, 'Bernardez', 'Marileus', 'BSIT 3', '09260086355', 'marileusbernardez@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 38, '2017-06-05'),
(2153094, 'Turqueza', 'Katherine A.', 'BSIT 3', '09352900979', 'turquezakath@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 6, '2017-06-05'),
(2153118, 'Fernandez', 'Mariella', 'BSIT 3', '09174131225', '2153118@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2153202, 'Dumdum', 'Ma. Jasiel Faye', 'BSIT 3', '09988538924', '2153202@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2153240, 'Alcaide', 'Arvince Neil A.', 'BSIT 3', '09202973256', 'alcaidearvince@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 21, '2017-06-05'),
(2153271, 'Dullao', 'Jeanne C.', 'BSIT 3', '09058075550', '2153270@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2153357, 'Valdez', 'Raphael M.', 'BSIT 3', '09366381495', 'raphaelmoa12@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 3, '2017-06-05'),
(2153455, 'Zipagan', 'Jerome N.', 'BSIT 3', '09506777313', '2153455@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2153674, 'Leonen', 'Aerhielle Cassandra', 'BSIT 3', '09056010355', '2153674@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2153777, 'Luna', 'Jaryd Reeve', 'BSIT 3', '09196166720', 'jarydluna28@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2153781, 'Bigornia', 'Krizzhia', 'BSIT 3', '09951481710', 'kc.bigornia@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 32, '2017-06-05'),
(2153797, 'De Guzman', 'Ryan Christian', 'BSIT 3', '09064763486', '2153797@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2153820, 'Delos Santos', 'Juan Miguel', 'BSIT 3', '09565978035', '2153820@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 22, '2017-06-05'),
(2153904, 'Dispo', 'Cyrene', 'BSIT 3', '09463544299', 'cyrenejanedispo132@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 6, '2017-06-05'),
(2153948, 'Suarez', 'Benedict', 'BSIT 3', '09064763492', '2153948@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2153974, 'Maslian', 'Averey Del-isen', 'BSIT 3', '09486808965', '2153974@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2154144, 'Ocado', 'Jennelyn N.', 'BSIT 3', '09774263008', 'jennocado@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 7, '2017-06-05'),
(2154183, 'Manzon', 'Jake James', 'BSIT 3', '09104008500', 'manzonjake15@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 30, '2017-06-05'),
(2154189, 'Abalos', 'Joshua James', 'BSIT 3', '09171332858', '2154189@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 30, '2017-06-05'),
(2154223, 'Jaramel', 'Kenneth Domenden', 'BSIT 3', '09305659133', 'kennethjaramel@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 30, '2017-06-05'),
(2154225, 'Torres', 'Princess Janyl', 'BSIT 3', '09332831555', 'princess.janyl.19@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2154269, 'Romero', 'Caesar Jim V.', 'BSIT 3', '09976142095', 'caesarromero1805@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 11, '2017-06-05'),
(2154291, 'Cabilar', 'Nonito Jr.', 'BSIT 3', '09098911000', 'nonitocabilar@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 30, '2017-06-05'),
(2154375, 'Prades', 'Jamina Jasren S.', 'BSIT 3', '09277783935', '2154375@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2154396, 'Benitez', 'Jinci Clyde', 'BSIT 3', '09260976790', 'jclydebenitez@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2154439, 'Marinas', 'Phebe Chris', 'BSIT 3', '09282670578', 'phebecris@yahoo.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2154585, 'Garcia', 'Zsarlene Alyza', 'BSIT 3', '09064770252', 'zsarlenealyza@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 12, '2017-06-05'),
(2154810, 'Bravo', 'Ma. Micaela P.', 'BSIT 3', NULL, '2154810@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 52, '2017-06-05'),
(2154904, 'Pulido', 'Jessa Camille E.', 'BSIT 3', '09773382909', 'jessacamille.jc@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 21, '2017-06-05'),
(2155651, 'Caguioa', 'Ma. Christine', 'BSIT 3', '09269044317', '2155651@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2155703, 'Lopez', 'Ramon I.', 'BSIT 3', '09162783918', '2155703@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 8, '2017-06-05'),
(2155757, 'Leones', 'Alfa Leizel', 'BSIT 3', '09089651798', 'alfaleones199@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2155789, 'De Alban', 'Kristine Jorgia', 'BSIT 3', '09166256814', '2155789@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 18, '2017-06-05'),
(2155825, 'Sarmiento', 'Franchesca Miguelle R.', 'BSCS 3', '09994336485', '2155825@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 13, '2017-06-05'),
(2155912, 'Ragay', 'Claudine Joy P.', 'BSIT 3', '09063593252', '2155912@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2155957, 'Langit', 'Ismael Cruz', 'BSIT 3', '09151046069', 'ismaelcruzlangit@gmail.com', 'yes', 'yes', 'yes', 'yes', 'Complete', 51, '2017-06-05'),
(2156068, 'Canaria', 'Patricia Anne', 'BSCS 3', '09269545636', 'canariapatriciaanne@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 40, '2017-06-05'),
(2156157, 'Antero', 'Randy Ezekiel Jr.', 'BSIT 3', '09062070025', 'anterorandy@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 30, '2017-06-05'),
(2156164, 'Basco', 'John Allen', 'BSIT 3', '09152893946', 'allenbascoo@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 51, '2017-06-05'),
(2156179, 'Bobadilla', 'Karl Genesis P.', 'BSIT 3', '09062733646', '2156179@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2156233, 'Wooden', 'Delson Markis A.', 'BSIT 3', '09092282423', '2156233@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 5, '2017-06-05'),
(2156523, 'Pagayonan', 'Elijah C.', 'BSIT 3', '09073796194', 'pagayonaneli@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 42, '2017-06-05'),
(2156749, 'Diaz', 'Stephen Paul', 'BSIT 3', '09478776726', 'stephendiaz263@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 34, '2017-06-05'),
(2157015, 'Sanchez', 'Daiben Angelo A.', 'BSIT 3', '09568193381', 'daibenangelosanchez@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 37, '2017-06-05'),
(2157588, 'Ravino', 'Jacob', 'BSIT 3', '09073216930', 'onivarjj@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 31, '2017-06-05'),
(2158841, 'Lopez', 'Samantha Marie', 'BSCS 3', '09175889848', 'samlopez92595@gmail.com', 'no', 'no', 'no', 'no', 'Incomplete', 24, '2017-06-05'),
(2159296, 'Radie', 'Patricia Mae', 'BSIT 3', NULL, '2159296@slu.edu.ph', 'no', 'no', 'no', 'no', 'Incomplete', 52, '2017-06-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idnum`),
  ADD KEY `company_id_idx` (`coid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`coid`) REFERENCES `company` (`coid`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
