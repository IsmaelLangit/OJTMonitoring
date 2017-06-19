-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 05:59 AM
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
  `company_head` varchar(60) DEFAULT NULL,
  `position` varchar(300) DEFAULT NULL,
  `typeofojt` varchar(30) NOT NULL,
  `typeofcompany` varchar(45) NOT NULL DEFAULT 'Private'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`coid`, `coname`, `coaddress`, `company_head`, `position`, `typeofojt`, `typeofcompany`) VALUES
(1, 'No Company', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(2, 'Docpro Business Solutions', 'Mezzanine Floor, CYA Centrum Bldg., Military Cut-Off, Kennon Road, Baguio City, 2600 Benguet', 'Rudy Clemente Jr.', 'Owner ', 'Company-based', 'Private'),
(3, 'Linkage', 'Quezon Hill, Road 1, Calle Uno, Baguio City, 2600 Benguet', 'Cristina Chua', 'HR Manager', 'Company-based', 'Private'),
(4, 'NOKIA Manila Technology Center', 'Building 1 UP Ayala Land TechnoHub, Commonwealth Avenue Barangay UP Campus, Diliman, Quezon City 1101', 'Joanne Faye S. Caparas', 'Recruitment & University Relations Specialist', 'Company-based', 'Private'),
(5, 'Philippine Military Academy', 'Fort Del Pilar, Loakan Road, Baguio, 2600 Benguet', 'Maria Monica C. Costales, PhD', 'Supervising Admin Officer (HRMO IV) Chief Civilian Personnel Affairs, OMA1', 'Company-based', 'Government'),
(6, 'ITCert Training Solutions', 'G/F SAJJ Building, Rimando Road, Baguio City, 2600 Benguet', 'Lou Philip Beltran', 'CEO', 'Company-based', 'Private'),
(7, 'Noble Trends Unbound Inc.', 'The Norwegian Collection Inc Bldg, Baguio Economic Zone, Loakan Rd, Baguio City, 2600 Benguet', 'Rafael R. Orpilla', 'President/CEO', 'Company-based', 'Private'),
(8, 'MOOG Control Corporation', ' Baguio Economic Zone, Loakan Road, Baguio City, 2600 Benguet', 'Rayah Sarile', 'Human Resource Head', 'Company-based', 'Private'),
(9, 'Chungdahm International', 'RSVP Building, 4 First Road, Quezon Hill, Baguio City, 2600 Benguet', 'Benigno Rosalino D. Cariaga', 'Operations Manager', 'Company-based', 'Private'),
(10, 'Benguet Provincial Capitol', 'Halsema Highway, La Trinidad, 2601 Benguet', 'Gov. Cresencio C. Pacalso', 'Governor', 'Company-based', 'Government'),
(11, 'Coca - Cola FEMSA Bottlers Philippines Inc.', 'Bued, Urdaneta - Calasiao Road, Calasiao, 2418 Pangasinan', 'Susano Silungan', 'Region Manager', 'Company-based', 'Private'),
(12, 'Sitel', 'Standard Factory Building 2, Baguio Economic Zone, Loakan Road, Baguio City, 2600 Benguet', 'Maria Lourdes Sison', 'Learning Specialist', 'Company-based', 'Private'),
(13, 'Philippine Long Distance Telephone Company (PLDT)', '22 Session Road, Baguio City, 2600 Benguet', 'John Gerald S. Marasigan', 'Senor Manager', 'Company-based', 'Private'),
(14, 'Baguio City Hall', 'Baguio City Hall, City Hall Drive, Baguio City, 2600 Benguet', 'Atty. Leticia O. Clemente', 'City Budget Officer', 'Company-based', 'Government'),
(15, 'Utalk Tutorial Services', '#11 First Road, Quezon Hill, Baguio City, 2600 Benguet', 'Norraine M. Dadula', 'Senior Operations Manager', 'Company-based', 'Private'),
(16, 'Baguio City Hall - Office of the City Councilor', 'Baguio City Hall, City Hall Drive, Baguio City, 2600 Benguet', 'Leandro B. Yangot Jr.', 'City Councilor', 'Company-based', 'Government'),
(17, 'Labrador Munincipal Hall - Accounting Office', 'Labrador Municipal Hall, Poblacion, Labrador, 2402 Pangasinan', 'Hon. Dominador V. Arenas', 'Municipal Mayor', 'Company-based', 'Government'),
(18, 'Philippine Statistics Authority - CAR', '141 Abanao Extension, Baguio City, 2600 Benguet', 'Villafe P. Alibuyog', 'Regional Director', 'Company-based', 'Government'),
(19, 'Metphil Medical Company', '3F Insular Life Building, Abanao Extension, Baguio City, 2600 Benguet', 'Jocelyn G. Punsalang', 'Corporate Secretary', 'Company-based', 'Private'),
(20, 'Department of Information and Communications Technology - CAR', 'Polo Field, Pacdal, Baguio City, 2600 Benguet', 'William Rojas', 'Director II', 'Company-based', 'Government'),
(21, 'Department of Interior and Local Government - CAR', 'Upper Session Road, 125 Corner North Drive, Baguio City, 2600 Benguet', 'Engr. Marlo L. Iringan', 'Regional Director, DILG CAR', 'Company-based', 'Government'),
(22, 'ITech PFS Technology Inc.', ' Unit 3-D West Burnham Place, Kisad Road, Baguio, 2600 Benguet', 'Sharon Q. Dalang', 'Branch Manager', 'Company-based', 'Private'),
(23, 'Department of Agrarian Reform - CAR', '#39 M. Roxas Street, Barangay Tabora, Baguio City, 2600 Benguet', 'Virginia Aycud', 'Chief Administrative Officer', 'Company-based', 'Government'),
(24, 'Department of Education - Baguio City Division', '#82 Military Cut-Off, Baguio City, 2600 Benguet', 'Olivia Gomez', 'Planning Officer III', 'Company-based', 'Government'),
(25, 'Gottes Segen Language Tutorial Center', 'Rm. A4, Juniper Building, Bonifacio Street, Baguio City, 2600 Benguet', 'Alpha Mae Pacio', 'School Director', 'Company-based', 'Private'),
(26, 'GMS Technology', 'Room 303, Lopez Building, La Brea Inn, Lower Session Road, Camp John Hay, Baguio, 2600 Benguet', 'Arch. Gueliro M. Sugano', 'Director', 'Company-based', 'Private'),
(27, 'Saint Louis University - SCIS Dean\'s Office', '3rd Floor Diego Silang Building, Saint Louis University, Bonifacio Street, Baguio City, 2600 Benguet', 'Dr. Cecillia A. Mercado', 'School Dean', 'In-house', 'Private'),
(28, 'PhilHealth Inc.', 'No:19, SN Oriental Building, Leonard Wood Rd, Baguio, 2600 Benguet', 'Atty. Jerry F. Ibay', 'Regional Vice President', 'Company-based', 'Private'),
(29, 'Philippine Scandinavian IT Services Inc.', 'The Penthouse, 5/F G.A.Yupangco Bldg., 339 Sen. Gil J. Puyat Ave. cor. N. Garcia St., Belair, 1209 Makati City ', 'Rachel Christensen', 'Director', 'Company-based', 'Private'),
(30, 'Baguio-Benguet Community Credit Cooperative', '#56 Cooperative Street, Assumption Road, Baguio City, 2600 Benguet', 'Mary Ann B. Bungag', 'Manager', 'Company-based', 'Private'),
(31, 'Post Ad Ventures Inc.', '599 Pina Ave, Sampaloc, Manila, 1016 Metro Manila', 'John Mateos Ong', 'Productions Director', 'Company-based', 'Private'),
(32, 'Syner G Outsourcing Inc.', '#2 Lower Ground Floor, Roman Ayson Road, Cresencia Village, Baguio City, 2600 Benguet', 'Ma. Theresa Yasay', 'President', 'Company-based', 'Private'),
(33, 'Incubix Technologies Inc. ', '28/F WideOut Office, Pacific Star Building, Makati Avenue cor. Gil Puyat Avenue Makati City, 1227 Metro Manila', 'John San Pedro', 'CEO', 'Company-based', 'Private'),
(34, 'Pru Life UK - Magnetite 2 Branch', '3/F DBP Building, Lower Session Road, Baguio City, 2600 Benguet', 'Myrna Lazo Solimen', 'Branch Manager', 'Company-based', 'Private'),
(35, 'Department of Education Division Office - ICT Section', '#82 Military Cut-off Road, Baguio City, 2600 Benguet', 'Harris G. Dizon', 'IT Department Head and Officer', 'Company-based', 'Government'),
(36, 'Department of Environment and Natural Resources - CAR', 'DENR Compound, Pacdal, Baguio City, 2600 Benguet', 'Engr. Ralph C. Pablo', 'Regional Director ', 'Company-based', 'Government'),
(37, 'Convergys', 'Building A, Baguio-AyalaLand TechnoHub, John Hay Special Tourism Economic Zone, Loakan Road, Baguio City, 2600 Benguet', 'Ma. Faye Castillo', 'Recruitment Manager', 'Company-based', 'Private'),
(38, 'Virtuosearch Inc.', '2/F Calle Uno Coworking Space, #3 Josefa Llanes Escoda St. First Road, cor. Naguilian Rd., Quezon Hill, Baguio City, 2600 Benguet', 'Jerome Remeur', 'CEO', 'Company-based', 'Private'),
(39, 'Alta Philippines IT Solutions and Web Page Design Inc.', '16F N3 Burgundy Corporate Tower, 152 Sen. Gil Puyat, Makati City', 'Edwin Cdwaling Jr.', 'Human Resource  Director', 'Company-based', 'Private'),
(40, '8Layer Technologies, Inc.', ' Unit 503, Seven East Capitol Building, East Capitol Drive cor. Sta. Rosa St., Brgy. Kapitolyo, Pasig, 1603 Metro Manila', 'Jeanniel Ilag', 'Human Resource Manager', 'Company-based', 'Private'),
(41, 'On Semiconductor Manufacturing Philippines', 'Luisita Industrial Park, San Miguel, Tarlac City, 2301 Tarlac', 'Eleonor Gallardo', 'Human Resource Manager', 'Company-based', 'Private'),
(42, 'Trend Micro', '8th Floor Tower 2, The Rockwell Business Center, 1600, Ortigas Avenue, Pasig City, Metro Manila', 'Joanna Aguinaldo', 'Human Resource Manager', 'Company-based', 'Private'),
(43, 'Sutherland', 'Ground Floor Luke Foundation Building, 90 Leonard Wood Road, Corner Cabinet Hill, Baguio City, 2600 Benguet', 'Lorie Ann Damasco', 'Senior Recruitment Specialist', 'Company-based', 'Private'),
(44, 'Acestar Solutions and Trading Inc.', 'Norwegian Collections Building, Loakan Rd, Greenwater Village, Baguio, 2600 Benguet', 'Rowena E. Samson', 'Operations manager', 'Company-based', 'Private'),
(45, 'Human Resource Department', 'John Hay Management Corporation, Camp John Hay, Baguio City, 2600 Benguet', 'Danny B. Latawan', 'Human Resource  Manager', 'Company-based', 'Private'),
(46, 'Sycip Gorres Velayo & Co. Member Firm of Ernst and Young Global', '6760 Ayala Avenue, Makati City, 1226 Metro Manila', 'Warren R. Bituin', 'Partner', 'Company-based', 'Private'),
(47, 'AKTUS Global Management Inc.', 'Unit 2005B 20th Floor West Tower, Philippine Stock Exchange Center, Exchange Road, Ortigas Center, Pasig, 1604 Metro Manila', 'Esteven D. Fulgar', 'POT Head', 'Company-based', 'Private'),
(48, 'Saint Louis University EISSIF', 'CCA Room C016, Saint Louis University, Bonifacio St., Baguio City, 2600 Benguet', 'Edmund B. Benaurdez', 'Director', 'In-house', 'Private'),
(49, 'National Telecommunications Commission - CAR', 'Leonard Wood Road, Baguio City, 2600 Benguet', 'Engr. Dante M. Vengua, PECE, CESE', 'OIC- Regional Director', 'Company-based', 'Government'),
(50, 'Manulife', '2nd Floor, E.S. Clemente Building, Shanum Street, Corner Otek Street, Baguio, 2600 Benguet', 'Joey M. Mejia', 'Unit Head - Polaris Jaguar Unit', 'Company-based', 'Private'),
(51, 'Saint Louis University - SCIS IT/CS Department', '3rd Floor Diego Silang Building, Saint Louis University, Bonifacio St., Baguio City, 2600 Benguet', 'Ma. Concepcion Clemente', 'Department Head', 'In-house', 'Private'),
(52, 'Saint Louis University - ICTR Laboratory', '3rd Floor Diego Silang Building, Saint Louis University, Bonifacio St., Baguio City, 2600 Benguet', 'Carlos Ben Montes', 'Officer-in-Charge', 'In-house', 'Private'),
(53, 'Device Dynamics Asia', 'LGF The Norwegian Building PEZA, Loakan Rd, Camp John Hay, Baguio, 2600 Benguet', 'Gilbert I. Mabotas', 'General Manager', 'Company-based', 'Private'),
(54, 'Accent Micro Technologies Incorporated', '8/F East Tower, Philippine Stock Exchange, Center, Exchange Road, Ortigas Center, Pasig City 1605', 'Allyxon Cua', 'CEO & President', 'Company-based', 'Private'),
(55, 'Teachers Camp', ' Leonard Wood Road, Baguio City, 2600 Benguet', 'Diosdado  S. Medina, Ed D.', 'Camp Superintendent', 'Company-based', 'Government'),
(56, 'Department of Social Welfare and Development - CAR', '#40 North Drive, Baguio City, 2600 Benguet', 'Janet P. Armas', 'OIC - Regional Director', 'Company-based', 'Government'),
(57, 'Commission on Elections ', 'Gov. Pack Road, Baguio City, 2600 Benguet', 'Atty. John Paul A. Martin', 'Election Officer', 'Company-based', 'Government'),
(58, 'Advanced World Solutions Inc.', 'Unit 3B 3/F Multinational Bancorp Center, 6805 Ayala Avenue, Makati City', '', '', 'Company-based', 'Private'),
(59, 'Cambridge University Press', '2/F, 357 Sen. Gil J. Puyat Ave, Makati, 1200 Metro Manila', 'Mr. Ronaldo Manalac', 'Company Head', 'Company-based', 'Private'),
(60, 'PLDT - Makati', 'Ramon Cojuangco Building, Makati Ave. corner Ayala Ave., Legaspi Village, Makati City, Metro Manila 1200', '', '', 'Company-based', 'Private'),
(61, 'Camp John Hay Golf Club, Inc.', 'Camp John Hay, Loakan Rd, Baguio, 2600 Benguet', '', '', 'Company-based', 'Private'),
(62, 'Zameco II', 'National Highway, Castillejos, 2208 Zambales', 'Engr. Alvin M. Farrales', 'General Manager', 'Company-based', 'Government'),
(63, 'Texas Instruments', 'PEZA Loakan Road, Baguio City, 2600 Benguet', 'Manie Mendoza', 'Recuritment Manager', 'Company-based', 'Private'),
(64, 'Bureau of Local Government Finance', '#75 Ferguson Road, Baguio City, 2600 Benguet', 'Ma. Florizelda A. Enriquez, CESE', 'Regional Director', 'Company-based', 'Government'),
(65, 'Zoomanity Group ', '339, 3rd Floor Yupangco Building, Senator Gil Puyat Avenue, Makati, 1200 Metro Manila', '', '', 'Company-based', 'Private'),
(66, 'Pru Life UK - Magnetite 3 Branch', '3/F DBP Building, Lower Session Road, Baguio City, 2600 Benguet', 'Rebecca Diaz', 'Unit Manager', 'Company-based', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idnum` int(11) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `courseyear` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(18) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `date_started` date NOT NULL DEFAULT '2017-06-05',
  `coid` int(11) DEFAULT '1',
  `release_endorsement` varchar(20) DEFAULT NULL,
  `receive_endorsement` varchar(20) DEFAULT NULL,
  `remark_endorsement` varchar(200) DEFAULT NULL,
  `endorsement` varchar(45) NOT NULL DEFAULT 'no',
  `release_waiver` varchar(20) DEFAULT NULL,
  `receive_waiver` varchar(20) DEFAULT NULL,
  `remark_waiver` varchar(200) DEFAULT NULL,
  `waiver` varchar(45) NOT NULL DEFAULT 'no',
  `release_moa` varchar(20) DEFAULT NULL,
  `receive_moa` varchar(20) DEFAULT NULL,
  `remark_moa` varchar(200) DEFAULT NULL,
  `moa` varchar(45) NOT NULL DEFAULT 'no',
  `release_evaluation` varchar(20) DEFAULT NULL,
  `receive_evaluation` varchar(20) DEFAULT NULL,
  `remark_evaluation` varchar(200) DEFAULT NULL,
  `evaluation` varchar(45) NOT NULL DEFAULT 'no',
  `status` varchar(10) NOT NULL DEFAULT 'Incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idnum`, `last_name`, `first_name`, `courseyear`, `mobile_number`, `email`, `date_started`, `coid`, `release_endorsement`, `receive_endorsement`, `remark_endorsement`, `endorsement`, `release_waiver`, `receive_waiver`, `remark_waiver`, `waiver`, `release_moa`, `receive_moa`, `remark_moa`, `moa`, `release_evaluation`, `receive_evaluation`, `remark_evaluation`, `evaluation`, `status`) VALUES
(993234, 'Ocampo', 'Macario', 'BSCS 4', '000-000-0000', '993234@slu.edu.ph', '2017-06-05', 27, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2107368, 'Obena', 'Jason', 'BSIT 4', '939-010-5758', 'obenajason@gmail.com', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2108867, 'Afsarikashi', 'Mehdi', 'BSIT 4', '906-265-8383', 'ix56@yahoo.com', '2017-06-05', 24, '', '2017-06-05', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2115153, 'Criste', 'Princess Marie Rose', 'BSIT 4', '915-676-4014', 'cescriste@gmail.com', '2017-06-05', 37, '', '', 'With reply of YES.', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2117919, 'Belocura', 'Lairde Vincent', 'BSIT 4', '935-314-6797', 'lairde29@gmail.com', '2017-06-05', 49, '2017-06-07', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2120329, 'Rull', 'Alexandria', 'BSIT 4', '977-257-0566', '2120329@slu.edu.ph', '2017-06-05', 56, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2121920, 'Espiritu', 'Christopher Edrian L.', 'BSIT 3', '975-008-1447', '2121920@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '2017-06-01', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2122776, 'Galletes', 'Jon Diel', 'BSIT 4', '000-000-0000', '2122776@slu.edu.ph', '2017-06-05', 1, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2122831, 'Salazar', 'Jean Michael', 'BSIT 4', '977-086-2591', 'jmsalazar0111@gmail.com', '2017-06-05', 49, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2123700, 'Oydoc', 'Raya Marie', 'BSIT 4', '946-520-1245', 'rayaoydoc@gmail.com', '2017-06-05', 24, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2123961, 'Aberin', 'Alvin Jan R.', 'BSCS 4', '915-130-3051', 'alvinaberin@gmail.com', '2017-06-05', 43, '', '', 'With reply of YES', 'yes', '2017-06-13', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2124586, 'Apostol', 'Shirlene Joy G.', 'BSIT 4', '956-559-6293', 'shirleneapostol008@gmail.com', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2125185, 'Orian', 'John Kevin', 'BSIT 4', '999-901-4045', 'kevin.orian@yahoo.com', '2017-06-05', 35, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2125241, 'Ishii', 'Satoyoshi', 'BSIT 4', '920-711-6402', 'ishiisatoyoshi@gmail.com', '2017-06-05', 38, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2126126, 'Barbuco', 'Christian Aris T.', 'BSIT 3', '906-262-0907', 'ArisBarbuco@gmail.com', '2017-06-05', 38, '2017-06-07', '2017-06-07', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2127538, 'Rai', 'Michael Angelo', 'BSIT 4', '926-082-7646', 'michaelangelorai@gmail.com', '2017-06-05', 56, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2130240, 'Tomines', 'Steven Michael', 'BSIT 3', '977-303-8070', 'Tomines.Steven@gmail.com', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2130906, 'Marquez', 'Jorge Clarence', 'BSCS 4', '930-178-1349', 'jorgeclarence007@gmail.com', '2017-06-05', 43, '', '', 'With reply of YES', 'yes', '2017-06-13', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2131506, 'Julhusin', 'Jomari', 'BSIT 3', '936-588-6378', '2131506@slu.edu.ph', '2017-06-05', 32, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2132368, 'Opiniano', 'Kieth Christian R.', 'BSIT 4', '998-997-1496', 'kiethopiniano21@gmail.com', '2017-06-05', 36, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2132852, 'Nuezca', 'Jorge Kenneth', 'BSIT 4', '000-000-0000', 'nuezcajorge@gmail.com', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2133154, 'Mariano', 'Clark', 'BSCS 4', '000-000-0000', '2133154@slu.edu.ph', '2017-06-05', 55, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2133376, 'De Guzman', 'Jay Esmane', 'BSIT 4', '905-142-5944', 'jayyydeguzman@gmail.com', '2017-06-05', 53, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2133513, 'Cayago', 'Zam', 'BSCS 4', '916-779-1813', 'zcayago@gmail.com', '2017-06-05', 43, '', '', 'With reply of YES', 'yes', '2017-06-13', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2133901, 'Ragandap', 'Jan Michael', 'BSIT 4', '933-471-1330', 'janxmichael1608@gmail.com', '2017-06-05', 53, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2133981, 'Soledad', 'Genie', 'BSIT 4', '997-294-9283', 'geniesoledad112295@gmail.com', '2017-06-05', 53, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2135009, 'Bacwaden', 'Rryhana Shaye G.', 'BSIT 4', '910-787-1958', 'rrhybacwaden@gmail.com', '2017-06-05', 45, '2017-06-07', '', '', 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2135211, 'Sam', 'Paul Christian C.', 'BSIT 3', '905-144-0423', 'paulchristiansam@gmail.com', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2135293, 'Manzano', 'Jayson Garcia', 'BSIT 4', '917-417-8392', 'jmanzano0896@gmail.com', '2017-06-05', 44, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2136158, 'Bernal', 'Richard Den', 'BSIT 4', '977-176-5997', 'bernal.chad@gmail.com', '2017-06-05', 64, '2017-06-15', '', '', 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2136469, 'Pelwigan', 'Darryl', 'BSIT 4', '907-088-0610', 'pdarrylgalyong@gmail.com', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2136625, 'Paredes', 'Diodatus', 'BSIT 4', '906-504-2640', 'thunderblaze2010@gmail.com', '2017-06-05', 26, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2136933, 'Bumidang', 'Luke', 'BSIT 4', '935-718-6906', 'jbacosta749@gmail.com', '2017-06-05', 44, '2017-06-07', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '2017-06-17', '2017-06-14', '', 'yes', '', '', '', 'no', 'Complete'),
(2140097, 'Santos', 'Christopher', 'BSIT 3', '917-926-2670', '2140097@slu.edu.ph', '2017-06-05', 10, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2140178, 'Medina', 'Isaac Emmanuel', 'BSCS 4', '000-000-0000', '2140178@slu.edu.ph', '2017-06-05', 4, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2140198, 'Cachero', 'Jean Louis', 'BSIT 4', '995-276-4399', 'jeanlouis1151@gmail.com', '2017-06-05', 52, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2140366, 'Dagang', 'Sean Arvin', 'BSIT 4', '000-000-0000', '2140366@slu.edu.ph', '2017-06-05', 38, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2140426, 'Sano-an', 'Emilion', 'BSIT 4', '949-352-5942', '2140426@slu.edu.ph', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2140556, 'Ugaldo', 'Jovi Rose E.', 'BSCS 4', '909-154-3610', 'joviroseugaldo@gmail.com', '2017-06-05', 23, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2142377, 'Edades', 'Olizar Bryn', 'BSIT 4', '926-267-8198', 'bryn.edades@gmail.com', '2017-06-05', 38, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2142825, 'Tolentino', 'Bianca Fleur', 'BSIT 4', '936-773-5284', 'tolentino_biancafleur@yahoo.com', '2017-06-05', 12, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143094, 'Garlejo', 'Galo Berlyn', 'BSIT 3', '000-000-0000', '2143094@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143185, 'Alawas', 'Crislyn', 'BSIT 4', '946-514-2097', '2143185@slu.edu.ph', '2017-06-05', 33, '2017-06-10', '', '', 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143278, 'De Leon', 'Dominik Felix', 'BSCS 4', '000-000-0000', '2143278@slu.edu.ph', '2017-06-05', 55, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143744, 'Sabiano', 'Diana Rose', 'BSIT 3', '950-320-3219', '2143744@slu.edu.ph', '2017-06-05', 33, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143766, 'Uy', 'Michael Vincent', 'BSCS 4', '939-928-6021', 'michaeluy@gmail.com', '2017-06-05', 43, '', '', 'With reply of YES', 'yes', '2017-06-13', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143782, 'Quezada', 'Paul Ian', 'BSIT 3', '946-550-8896', '2143782@slu.edu.ph', '2017-06-05', 34, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143836, 'Lalas', 'Lucky Christian', 'BSIT 4', '927-299-3633', 'miyahira.christian@gmail.com', '2017-06-05', 56, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2143871, 'Aquino', 'Raja Mecca Z.', 'BSIT 3', '955-340-0512', 'rajaa.aquino@gmail.com', '2017-06-05', 37, '2017-06-06', '2017-06-16', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144062, 'Quiambao', 'Ryan Christopher R.', 'BSIT 3', '956-559-6266', '2144062@slu.edu.ph', '2017-06-05', 38, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144074, 'Oliva', 'Lovelace Zennia', 'BSIT 4', '948-127-3131', '2144074@slu.edu.ph', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144190, 'Hirai', 'Erika Mae C.', 'BSIT 3', '915-896-4178', '2144190@slu.edu.ph', '2017-06-05', 17, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144251, 'Cabildo', 'Christine Joy', 'BSIT 4', '905-398-3127', '2144251@slu.edu.ph', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144273, 'Cogasi', 'Swira Claire', 'BSIT 3', '995-145-1756', 'cswiraclaire@gmail.com', '2017-06-05', 10, '', '', 'With reply of YES', 'yes', '2017-06-17', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144311, 'Chu', 'Amariz Joy', 'BSIT 4', '942-849-2097', '2144311@slu.edu.ph', '2017-06-05', 33, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144592, 'Goyo', ' Gloridhel', 'BSIT 3', '905-181-8197', '2144592@slu.edu.ph', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144690, 'Abad', 'Mark Joseph C.', 'BSIT 4', '915-285-6391', '2144690@slu.edu.ph', '2017-06-05', 10, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2144780, 'Beltran', 'Christian', 'BSIT 3', '915-271-0190', '2144780@slu.edu.ph', '2017-06-05', 12, '2017-06-06', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2145098, 'Estacio', 'Lemuel', 'BSIT 3', '915-942-8736', 'estacio.lemuel@gmail.com', '2017-06-05', 12, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2145473, 'Bitmead', 'Steven Gregory', 'BSIT 4', '928-348-4843', 'bitmeadsteven@gmail.com', '2017-06-05', 2, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2146153, 'Francisco', 'Timothy Redd', 'BSIT 3', '916-140-3309', 't.reddfrancisco@gmail.com', '2017-06-05', 42, '', '', '', 'no', '', '', 'Sent through Email.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2146163, 'Amos', 'Resilyn C.', 'BSIT 3', '948-213-4252', 'resilyn.ra@gmail.com', '2017-06-05', 48, '2017-06-07', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2146417, 'Ronquillo', 'Lyra Joyce', 'BSIT 4', '997-264-2226', '2146417@slu.edu.ph', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2146624, 'Alinso', 'Ian Paul M.', 'BSIT 3', '909-808-0680', 'yanzkytootsky@gmail.com', '2017-06-05', 10, '', '', 'With reply of YES', 'yes', '2017-06-01', '2017-06-10', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2146986, 'Belino', 'Alysson', 'BSIT 4', '977-825-3744', 'belinoalysson@gmail.com', '2017-06-05', 48, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2147643, 'Festejo', 'Leo Dominique Angelo M.', 'BSCS 3', '920-625-1553', 'leofestejo@gmail.com', '2017-06-05', 23, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2147790, 'Arzadon', 'CD Mae D.', 'BSIT 3', '906-254-5652', '2147790@slu.edu.ph', '2017-06-05', 25, '2017-06-02', '', 'With reply of YES', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2147840, 'Dela PeÃ±a', 'Adriana Jenar', 'BSIT 3', '955-702-0307', 'ajdp927@gmail.com', '2017-06-05', 33, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150048, 'Testado', 'Janriel G.', 'BSIT 3', '908-304-6060', 'testado.janriel@gmail.com', '2017-06-05', 31, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150065, 'Zheng', 'Mary Anne (Wen Yao)', 'BSIT 3', '906-359-6319', '2150065@slu.edu.ph', '2017-06-05', 63, '', '', 'With reply of YES', 'yes', '2017-06-05', '2017-06-17', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150084, 'Zheng', 'Mary Jane (Wen Ya) Q.', 'BSIT 3', '977-198-2259', '2150084@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150218, 'Genove', 'Sean Dustine ', 'BSIT 3', '935-375-7297', '2150218@slu.edu.ph', '2017-06-05', 59, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150278, 'Sayco', 'Ma. Danavie', 'BSIT 3', '999-771-4840', 'dnvsayco@gmail.com', '2017-06-05', 42, '', '', '', 'no', '2017-06-05', '2017-06-06', 'Sent through Email.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150300, 'Redondo', 'James Patrick O.', 'BSIT 3', '935-777-1603', 'jmspredondo@gmail.com', '2017-06-05', 47, '', '', '', 'no', '2017-06-05', '2017-06-06', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150378, 'Sevilla', 'Louella Darlene', 'BSCS 3', '000-000-0000', '2143278@slu.edu.ph', '2017-06-05', 42, '', '', '', 'no', '', '', 'Sent through Email.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150387, 'Fernandez', 'Alainne', 'BSCS 3', '977-105-9696', 'fernandezalainne@gmail.com', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150417, 'Maganes', 'Earvin Grant ', 'BSIT 3', '000-000-0000', '2150417@slu.edu.ph', '2017-06-05', 42, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150428, 'Fama', 'Charlene T.', 'BSIT 3', '926-854-9704', '2150428@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150485, 'Castro', 'Marian Roane B.', 'BSIT 3', '927-641-8951', '2150485@slu.edu.ph', '2017-06-05', 9, '', '', 'With reply of YES', 'yes', '2017-05-31', '2017-06-01', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150506, 'Laban', 'Joshua N.', 'BSIT 3', '908-782-1365', '2150506@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '2017-06-06', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150509, 'Donglawen', 'Dean Earl O.', 'BSIT 3', '939-371-1020', 'deanfailed@gmail.com', '2017-06-05', 31, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150521, 'DasmariÃ±as', 'Walter Angelo', 'BSIT 3', '995-643-1154', 'walterangelo@gmail.com', '2017-06-05', 39, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150536, 'Del Rosario', 'Jerome D.', 'BSCS 3', '915-347-8922', '2150536@slu.edu.ph', '2017-06-05', 15, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150792, 'Saringan', 'Danielle Shaerene R.', 'BSIT 3', '932-473-6421', 'danielleshaerene@gmail.com', '2017-06-05', 21, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150804, 'Catalan', 'Paul Jimuel', 'BSCS 3', '000-000-0000', '2150804@slu.edu.ph', '2017-06-05', 55, '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150822, 'Dicen', 'Shania Isabelle H.', 'BSCS 3', '995-995-7372', 'shaniadicen@gmail.com', '2017-06-05', 63, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150834, 'Yu', 'Rommel Justin', 'BSIT 3', '955-317-1650', 'rommelyu750@gmail.com', '2017-06-05', 32, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150854, 'Malones', 'David Benedict', 'BSIT 3', '916-457-1093', 'david012098@gmail.com', '2017-06-05', 46, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150890, 'Tomines', 'Christine Minamori', 'BSIT 3', '000-000-0000', '2150890@slu.edu.ph', '2017-06-05', 42, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150907, 'Cardenas', 'David Wyatt ', 'BSCS 3', '000-000-0000', '2150907@slu.edu.ph', '2017-06-05', 4, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150915, 'Eslao', 'Mark Joshua', 'BSIT 3', '927-288-7466', '2150915@slu.edu.ph', '2017-06-05', 9, '', '', 'With reply of YES', 'yes', '2017-05-31', '2017-06-02', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150936, 'Jimenez', 'Zebedee V.', 'BSCS 3', '917-508-0254', '2150936@slu.edu.ph', '2017-06-05', 19, '', '', 'With reply of YES', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150942, 'Mondiguing', 'Ali Brian ', 'BSCS 3', '918-482-3559', '2150942@slu.edu.ph', '2017-06-05', 61, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150958, 'Delson', 'Teodoro Jr.', 'BSIT 3', '000-000-0000', '2150958@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '2017-06-02', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150964, 'Ocampo', 'Jessie James', 'BSIT 3', '935-501-0658', '2150964@slu.edu.ph', '2017-06-05', 8, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2150989, 'Aspiras', 'Adrian John ', 'BSCS 3', '915-865-2108', '2150989@slu.edu.ph', '2017-06-05', 61, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151084, 'Carantes', 'Ethnica Jaya', 'BSCS 3', '915-813-7110', 'carantesethnica@gmail.com', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151128, 'David', 'Josepablo Jr. E.', 'BSCS 3', '915-869-9162', '2151128@slu.edu.ph', '2017-06-05', 19, '', '', 'With reply of YES', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151211, 'Caballar', 'Randall Elijah', 'BSIT 3', '917-680-0658', '2151211@slu.edu.ph', '2017-06-05', 22, '2017-06-02', '2017-06-14', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151220, 'Viray', 'Froilan Mark', 'BSIT 3', '956-128-2968', 'f.markviray18@gmail.com', '2017-06-05', 11, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151252, 'Guieb', 'Rey Meljohn S.', 'BSIT 3', '927-718-5206', 'reymeljohnguieb22@gmail.com', '2017-06-05', 31, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151287, 'Bangui', 'Heinrich P.', 'BSIT 3', '919-684-0747', 'heinrichbangui@gmail.com', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151299, 'Kolodzik', 'Rio Vann ', 'BSCS 3', '000-000-0000', '2151299@slu.edu.ph', '2017-06-05', 60, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151305, 'Mauri', 'Diane Kaye', 'BSIT 3', '975-906-3957', 'kayemauri@gmail.com', '2017-06-05', 58, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151355, 'Lagunilla', 'Kenneth O.', 'BSIT 3', '948-790-7421', 'kennethlagunilla44@gmail.com', '2017-06-05', 58, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151386, 'Viloria', 'Kristine Mae', 'BSIT 3', '995-103-2417', '2151386@slu.edu.ph', '2017-06-05', 50, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151401, 'Licud', 'Ronald C.', 'BSIT 3', '916-415-1960', 'rlicud7@gmail.com', '2017-06-05', 39, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151434, 'AÃ±onuevo', 'James R.', 'BSIT 3', '927-654-6959', '2151434@slu.edu.ph', '2017-06-05', 54, '2017-06-09', '2017-06-09', 'With reply of YES', 'yes', '', '', '', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151445, 'Miranda', 'Janina Valerie B.', 'BSIT 3', '999-370-2753', 'mirandajaninavalerie@gmail.com', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151524, 'Pagaduan', 'Sherene Joyce', 'BSIT 3', '977-821-9050', 'shenmp13@gmail.com', '2017-06-05', 39, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151666, 'Andawi', 'Mark Jr. A.', 'BSIT 3', '995-235-1069', 'markandawi@gmail.com', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151676, 'Sahagun', 'Sean William', 'BSIT 3', '921-225-6287', 'williamsahagun@gmail.com', '2017-06-05', 61, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151688, 'Manantan', 'John Carlo', 'BSCS 3', '906-255-7565', 'johncarlomanantan@gmail.com', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151698, 'Marcelo', 'Aira Joy', 'BSIT 3', '906-579-0143', 'airamarcelo@gmail.com', '2017-06-05', 39, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151727, 'Ramirez', 'Emari Sandra S.', 'BSIT 3', '905-932-2599', '2151727@slu.edu.ph', '2017-06-05', 29, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151733, 'Reynon', ' Paul Kennedy', 'BSCS 3', '000-000-0000', '2151733@slu.edu.ph', '2017-06-05', 65, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151796, 'Garcia', 'Jay B.', 'BSIT 3', '926-340-5206', '2151796@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '2017-06-01', '2017-06-06', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151803, 'Prado', 'Jhennie Caroline Hiyasmin', 'BSCS 3', '000-000-0000', '2151803@slu.edu.ph', '2017-06-05', 55, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151809, 'Jacob', 'Princess', 'BSIT 3', '000-000-0000', '2151809@slu.edu.ph', '2017-06-05', 9, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151828, 'Erese', 'Erico Alfonz S.', 'BSCS 3', '916-575-5144', '2151828@slu.edu.ph', '2017-06-05', 41, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151837, 'Cabanban', 'Eldridge', 'BSIT 3', '915-708-3555', 'eldridge.cabanban@gmail.com', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151848, 'Araos', 'Angelo Austin T.', 'BSIT 3', '905-368-0799', '2151848@slu.edu.ph', '2017-06-05', 22, '2017-06-05', '2017-06-05', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151857, 'Villacentino', 'Catherine Mae', 'BSIT 3', '927-848-9960', '2151857@slu.edu.ph', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151872, 'Abellera', 'Karl Andaya', 'BSIT 3', '000-000-0000', '2151872@slu.edu.ph', '2017-06-05', 4, '', '', '', 'no', '', '', 'Sent through Email.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151890, 'Soy', 'Tyrone Joshua', 'BSIT 3', '935-794-6065', 'soy.tyrone@gmail.com', '2017-06-05', 58, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151928, 'Rivera', 'Duke Carlos', 'BSIT 3', '926-881-8050', '2151928@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '2017-06-05', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2151951, 'Carreon', 'Engelyn', 'BSIT 3', '956-597-8070', '2151951@slu.edu.ph', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152009, 'Mina', 'Apollo Joshua', 'BSIT 3', '915-480-0448', 'apollomina1@gmail.com', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152015, 'Viloria', 'Dixon Aldwin O.', 'BSIT 3', '905-229-6579', '2152015@slu.edu.ph', '2017-06-05', 5, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152023, 'Balicha', 'Elmer', 'BSIT 3', '915-395-6050', 'elmerbalicha@gmail.com', '2017-06-05', 5, '2017-06-06', '2017-06-07', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'yes', '', '', '', 'no', 'Incomplete'),
(2152026, 'Aquino', 'Ryan Christian', 'BSIT 3', '000-000-0000', '2152026@slu.edu.ph', '2017-06-05', 8, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152028, 'Leonardo', 'Vironica M.', 'BSIT 3', '916-895-6234', 'vironicaleonardo@gmail.com', '2017-06-05', 12, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152056, 'Cabantac', 'Emmanuel Alfonso B.', 'BSIT 3', '975-862-8947', '2152056@slu.edu.ph', '2017-06-05', 31, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', 'Signed by the Company.', 'yes', '2017-06-16', '2017-06-10', '', 'yes', '', '', '', 'no', 'Complete'),
(2152110, 'Dy', 'Jamaica Marie T.', 'BSIT 3', '906-595-7741', 'jmdy111397@gmail.com', '2017-06-05', 32, '', '', '', 'no', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152127, 'Geraldez', 'Maureen Serote', 'BSIT 3', '916-774-7700', 'geraldezmau@gmail.com', '2017-06-05', 42, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152142, 'Dadula', 'Jason Paul M.', 'BSCS 3', '995-763-5322', '2152142@slu.edu.ph', '2017-06-05', 15, '', '', 'With reply of YES', 'yes', '2017-06-02', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152155, 'Halos', 'Neri Mae', 'BSIT 3', '000-000-0000', '2152155@slu.edu.ph', '2017-06-05', 9, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152165, 'Castro', 'Alissa ', 'BSCS 3', '000-000-0000', '2152165@slu.edu.ph', '2017-06-05', 42, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152176, 'Cabalse', 'Ariane Faye E.', 'BSIT 3', '995-487-5955', '2152176@slu.edu.ph', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', 'Passed to Maam Macon', 'yes', '', '', '', 'yes', '', '', '', 'no', 'Complete'),
(2152181, 'Taccayan', 'Danzel', 'BSIT 3', '906-172-8207', 'taccayandanzel@gmail.com', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152195, 'Gagelonia', 'Jenmar R.', 'BSIT 3', '927-874-6586', '2152195@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152201, 'Bayote', 'Rusell', 'BSIT 3', '916-414-6533', 'rusellbayote@gmail.com', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152214, 'Malicdem', 'Leo', 'BSIT 3', '956-851-5595', '2152214@slu.edu.ph', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152242, 'Gonzales', 'Jepanee Abishei T.', 'BSIT 3', '930-709-8602', 'jepanee.abishei@gmail.com', '2017-06-05', 16, '', '', 'With reply of YES', 'yes', '2017-06-05', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152281, 'Calpito', 'Maureen Nicole', 'BSIT 3', '949-179-0004', 'maureenicolecalpito17@gmail.com', '2017-06-05', 12, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152333, 'Malabanan', 'Coleen Gabrielle M.', 'BSIT 3', '995-106-5399', 'gabmapalo@gmail.com', '2017-06-05', 29, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152430, 'Dela Rosa', 'Mon Joel C.', 'BSIT 3', '917-840-4967', '2152430@slu.edu.ph', '2017-06-05', 3, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152544, 'Arbolente', 'Kathleen Dianne A.', 'BSIT 3', '915-382-1592', '2152544@slu.edu.ph', '2017-06-05', 51, '2017-06-07', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152557, 'Argao', 'Joneil S.', 'BSIT 3', '939-552-5668', 'joneilargao.ja@gmail.com', '2017-06-05', 62, '', '', '', 'no', '2017-06-07', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152573, 'Castillo', 'Mark Ryan B.', 'BSIT 3', '936-749-3763', 'markryanc23@gmail.com', '2017-06-05', 14, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152598, 'Culbengan', 'Denver P.', 'BSIT 3', '915-420-8813', 'crimelight24@gmail.com', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152813, 'Cayabyab', 'Dianne Alyza', 'BSIT 3', '930-942-1945', 'diannecayabyab@gmail.com', '2017-06-05', 28, '', '', 'With reply of YES', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152826, 'Marfil', 'Marvie Yuki', 'BSIT 3', '926-002-3117', '2152826@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152834, 'Centino', 'Sarah Mae E.', 'BSIT 3', '910-929-0518', '2152824@slu.edu.ph', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152844, 'Dalayoan', 'Clint Deric', 'BSIT 3', '995-816-7067', 'cdalayoan98@gmail.com', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2152873, 'Mones', 'Angelica R.', 'BSCS 3', '995-220-2765', '2152873@slu.edu.ph', '2017-06-05', 23, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153020, 'Bernardez', 'Marileus', 'BSIT 3', '926-008-6355', 'marileusbernardez@gmail.com', '2017-06-05', 38, '2017-06-08', '2017-06-09', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153094, 'Turqueza', 'Katherine A.', 'BSIT 3', '935-290-0979', 'turquezakath@gmail.com', '2017-06-05', 6, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153118, 'Fernandez', 'Mariella', 'BSIT 3', '917-413-1225', '2153118@slu.edu.ph', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153202, 'Dumdum', 'Ma. Jasiel Faye', 'BSIT 3', '998-853-8924', '2153202@slu.edu.ph', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153240, 'Alcaide', 'Arvince Neil A.', 'BSIT 3', '920-297-3256', 'alcaidearvince@gmail.com', '2017-06-05', 21, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153271, 'Dullao', 'Jeanne C.', 'BSIT 3', '905-807-5550', '2153270@slu.edu.ph', '2017-06-05', 5, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153357, 'Valdez', 'Raphael M.', 'BSIT 3', '936-638-1495', 'raphaelmoa12@gmail.com', '2017-06-05', 3, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153455, 'Zipagan', 'Jerome N.', 'BSIT 3', '950-677-7313', '2153455@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153674, 'Leonen', 'Aerhielle Cassandra', 'BSIT 3', '905-601-0355', '2153674@slu.edu.ph', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153777, 'Luna', 'Jaryd Reeve', 'BSIT 3', '919-616-6720', 'jarydluna28@gmail.com', '2017-06-05', 34, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153781, 'Bigornia', 'Krizzhia', 'BSIT 3', '995-148-1710', 'kc.bigornia@gmail.com', '2017-06-05', 32, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153797, 'De Guzman', 'Ryan Christian', 'BSIT 3', '906-476-3486', '2153797@slu.edu.ph', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153820, 'Delos Santos', 'Juan Miguel', 'BSIT 3', '956-597-8035', '2153820@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153904, 'Dispo', 'Cyrene', 'BSIT 3', '946-354-4299', 'cyrenejanedispo132@gmail.com', '2017-06-05', 6, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153948, 'Suarez', 'Benedict', 'BSIT 3', '906-476-3492', '2153948@slu.edu.ph', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2153974, 'Maslian', 'Averey Del-isen', 'BSIT 3', '948-680-8965', '2153974@slu.edu.ph', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154144, 'Ocado', 'Jennelyn N.', 'BSIT 3', '977-426-3008', 'jennocado@gmail.com', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154183, 'Manzon', 'Jake James', 'BSIT 3', '910-400-8500', 'manzonjake15@gmail.com', '2017-06-05', 30, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154189, 'Abalos', 'Joshua James A.', 'BSIT 3', '917-133-2858', '2154189@slu.edu.ph', '2017-06-05', 30, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '2017-06-16', '2017-06-17', '', 'yes', '', '', '', 'no', 'Complete'),
(2154223, 'Jaramel', 'Kenneth D.', 'BSIT 3', '930-565-9133', 'kennethjaramel@gmail.com', '2017-06-05', 30, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154225, 'Torres', 'Princess Janyl', 'BSIT 3', '933-283-1555', 'princess.janyl.19@gmail.com', '2017-06-05', 66, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154269, 'Romero', 'Caesar Jim V.', 'BSIT 3', '997-614-2095', 'caesarromero1805@gmail.com', '2017-06-05', 11, '', '', 'With reply of YES', 'yes', '2017-06-01', '2017-06-02', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154291, 'Cabilar', 'Nonito Jr.', 'BSIT 3', '909-891-1000', 'nonitocabilar@gmail.com', '2017-06-05', 30, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154295, 'Agcon', 'April Joy', 'BSCS 3', '000-000-0000', '2154295@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '2017-05-31', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154375, 'Prades', 'Jamina Jasren S.', 'BSIT 3', '927-778-3935', '2154375@slu.edu.ph', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154396, 'Benitez', 'Jinci Clyde', 'BSIT 3', '926-097-6790', 'jclydebenitez@gmail.com', '2017-06-05', 34, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154439, 'Marinas', 'Phebe Chris', 'BSIT 3', '928-267-0578', 'phebecris@yahoo.com', '2017-06-05', 34, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154585, 'Garcia', 'Zsarlene Alyza', 'BSIT 3', '906-477-0252', 'zsarlenealyza@gmail.com', '2017-06-05', 12, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154715, 'Aurelio', 'Jan Lorenz', 'BSIT 3', '927-718-6041', '2154715@slu.edu.ph', '2017-06-05', 22, '2017-06-05', '2017-06-05', 'With reply of YES', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154810, 'Bravo', 'Ma. Micaela P.', 'BSIT 3', '995-148-0646', '2154810@slu.edu.ph', '2017-06-05', 52, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2154904, 'Pulido', 'Jessa Camille E.', 'BSIT 3', '977-338-2909', 'jessacamille.jc@gmail.com', '2017-06-05', 21, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155651, 'Caguioa', 'Ma. Christine', 'BSIT 3', '926-904-4317', '2155651@slu.edu.ph', '2017-06-05', 5, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155673, 'Baucas', 'Marinel', 'BSIT 3', '946-195-1582', '2155673@slu.edu.ph', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155703, 'Lopez', 'Ramon Franco', 'BSIT 3', '916-278-3918', '2155703@slu.edu.ph', '2017-06-05', 8, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155757, 'Leones', 'Alfa Leizel', 'BSIT 3', '908-965-1798', 'alfaleones199@gmail.com', '2017-06-05', 66, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155789, 'De Alban', 'Kristine Jorgia', 'BSIT 3', '916-625-6814', '2155789@slu.edu.ph', '2017-06-05', 18, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155794, 'Maniti', 'Aldrienne Janne', 'BSIT 3', '916-457-1093', '2155794@slu.edu.ph', '2017-06-05', 22, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155825, 'Sarmiento', 'Franchesca Miguelle R.', 'BSCS 3', '999-433-6485', '2155825@slu.edu.ph', '2017-06-05', 7, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155912, 'Ragay', 'Claudine Joy P.', 'BSIT 3', '906-359-3252', '2155912@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2155957, 'Langit', 'Ismael Cruz', 'BSIT 3', '915-104-6069', 'ismaelcruzlangit@gmail.com', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', 'Passed to Maam Macon', 'yes', '', '', '', 'yes', '', '', '', 'no', 'Complete'),
(2156068, 'Canaria', 'Patricia Anne', 'BSCS 3', '926-954-5636', 'canariapatriciaanne@gmail.com', '2017-06-05', 40, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', 'WITHOUT SIGN from the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2156157, 'Antero', 'Randy Ezekiel Jr. S.', 'BSIT 3', '906-207-0025', 'anterorandy@gmail.com', '2017-06-05', 30, '2017-06-02', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2156164, 'Basco', 'John Allen E.', 'BSIT 3', '915-289-3946', 'allenbascoo@gmail.com', '2017-06-05', 51, '', '', 'With reply of YES', 'yes', '', '', 'Passed to Maam Macon', 'yes', '', '', '', 'yes', '', '', '', 'no', 'Complete'),
(2156179, 'Bobadilla', 'Karl Genesis P.', 'BSIT 3', '906-273-3646', '2156179@slu.edu.ph', '2017-06-05', 5, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2156233, 'Wooden', 'Delson Markis A.', 'BSIT 3', '909-228-2423', '2156233@slu.edu.ph', '2017-06-05', 5, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2156523, 'Pagayonan', 'Elijah C.', 'BSIT 3', '907-379-6194', 'pagayonaneli@gmail.com', '2017-06-05', 42, '', '', '', 'no', '2017-06-05', '2017-06-06', 'Sent through Email.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2156749, 'Diaz', 'Stephen Paul', 'BSIT 3', '947-877-6726', 'stephendiaz263@gmail.com', '2017-06-05', 34, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2157015, 'Sanchez', 'Daiben Angelo A.', 'BSIT 3', '956-819-3381', 'daibenangelosanchez@gmail.com', '2017-06-05', 37, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the company', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2157588, 'Ravino', 'Jacob', 'BSIT 3', '907-321-6930', 'onivarjj@gmail.com', '2017-06-05', 31, '', '', 'With reply of YES. Submitted through online', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2158817, 'Lee', 'Mandy Maurice', 'BSCS 3', '000-000-0000', '2158817@slu.edu.ph', '2017-06-05', 1, '', '', NULL, 'no', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2158841, 'Lopez', 'Samantha Marie', 'BSCS 3', '917-588-9848', 'samlopez92595@gmail.com', '2017-06-05', 24, '', '', 'With reply of YES', 'yes', '', '', '', 'no', '', '', '', 'no', '', '', '', 'no', 'Incomplete'),
(2159296, 'Radie', 'Patricia Mae', 'BSIT 3', '949-502-1515', '2159296@slu.edu.ph', '2017-06-05', 52, '', '', 'With reply of YES', 'yes', '', '', 'Signed by the Company.', 'yes', '', '', '', 'no', '', '', '', 'no', 'Incomplete');

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
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
