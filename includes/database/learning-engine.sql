-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2015 at 01:25 PM
-- Server version: 5.1.73-cll-lve
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learning-engine`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
`ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `date`, `name`, `target`) VALUES
(1, '2015-04-19 16:54:56', 'Java OCP', 90);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
`ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `response` text NOT NULL,
  `correct` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID`, `date`, `studentID`, `courseID`, `moduleID`, `questionID`, `response`, `correct`) VALUES
(1, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(2, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(3, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(4, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(5, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(6, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 1),
(7, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(8, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(9, '0000-00-00 00:00:00', 1, 1, 1, 1, '3', 0),
(10, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(11, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(12, '0000-00-00 00:00:00', 1, 1, 1, 1, '1', 0),
(13, '0000-00-00 00:00:00', 1, 1, 1, 1, '1, 2, 3', 0),
(14, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(15, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(16, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(17, '0000-00-00 00:00:00', 1, 1, 1, 1, '4', 1),
(18, '2015-04-20 17:37:56', 1, 1, 1, 1, '4', 1),
(19, '2015-04-20 18:04:38', 1, 1, 1, 1, '4', 1),
(20, '2015-04-20 18:05:37', 1, 1, 1, 1, '4', 1),
(21, '2015-04-20 18:27:45', 1, 1, 1, 1, '5', 0),
(22, '2015-04-20 18:29:12', 1, 1, 1, 1, '4', 1),
(23, '2015-04-20 20:36:44', 1, 1, 3, 1, '3', 1),
(24, '2015-04-25 07:14:10', 1, 1, 1, 1, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
`ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `courseID` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ID`, `date`, `courseID`, `name`, `number`) VALUES
(3, '2015-04-25 10:19:50', 1, 'Declarations and Access Control', 1),
(4, '2015-04-25 10:20:32', 1, 'Object Orientation', 2),
(5, '2015-04-25 10:57:49', 1, 'Assignments', 3),
(6, '2015-04-25 10:59:09', 1, 'Operators', 4),
(7, '2015-04-25 10:59:31', 1, 'Working with Strings, Arrays and ArrayLists', 5),
(8, '2015-04-25 10:59:46', 1, 'Flow Control and Exceptions', 6),
(9, '2015-04-25 11:00:03', 1, 'Assertions and Java 7 Exceptions', 7),
(10, '2015-04-25 11:00:14', 1, 'String Processing, Data Formatting, Resource Bundles', 8),
(11, '2015-04-25 11:00:21', 1, 'I/O and NIO', 9),
(12, '2015-04-25 11:00:30', 1, 'Advanced OO and Design Patterns', 10),
(13, '2015-04-25 11:00:37', 1, 'Generics and Collections', 11),
(14, '2015-04-25 11:00:44', 1, 'Inner Classes', 12),
(15, '2015-04-25 11:01:00', 1, 'Threads', 13),
(16, '2015-04-25 11:01:23', 1, 'Concurrency', 14),
(17, '2015-04-25 11:01:23', 1, 'JDBC', 15);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
`ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `courseID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `exhibit` text,
  `questionText` text NOT NULL,
  `number` int(11) NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `option5` text NOT NULL,
  `option6` text NOT NULL,
  `option7` text NOT NULL,
  `option8` text NOT NULL,
  `answer` text NOT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `date`, `courseID`, `moduleID`, `exhibit`, `questionText`, `number`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `answer`, `explanation`) VALUES
(33, '2015-04-25 13:01:23', 1, 3, NULL, 'Which are true? (Choose all that apply.)', 1, '"X extends Y" is correct if and only if X is a class and Y is an interface.', '"X extends Y" is correct if and only if X is an interface and Y is a class.', '"X extends Y" is correct if X and Y are either both classes or both interfaces.', '"X extends Y" is correct for all combinations of X and Y being classes and/or interfaces.', '', '', '', '', '3', '1 is incorrect because classes implement interfaces, they don''t extend them. 2 is incorrect because interfaces only "inherit from" other interfaces. 4 is incorrect based on the preceding rules. (OCA Objective 7.6)'),
(36, '2015-04-25 13:02:20', 1, 3, NULL, 'Given:\r\n<code>\r\nclass Rocket {\r\n  private void blastOff() { System.out.print("bang "); }\r\n}\r\npublic class Shuttle extends Rocket {\r\n  public static void main(String[] args) {\r\n    new Shuttle().go();\r\n  }\r\n  void go() {\r\n    blastOff():\r\n    // Rocket.blastOff(); // line A\r\n  }\r\n  private void blastOff() { System.out.print("sh-bang "; }\r\n}\r\n</code>\r\nWhich are true? (Choose all that apply.)', 2, 'As the code stands, the output is <code>bang</code>', 'As the code stands, the output is <code>sh-bang</code>', 'As the code stands, compilation fails.', 'If line A is uncommented, the output is <code>bang bang</code>', 'If line A is uncommented, the output is <code>sh-bang bang</code>', 'If line A is uncommented, compilation fails.', '', '', '2,6', 'Since <code>Rocket.blastOff()</code> is private, it can''t be overridden, and it is invisible to class <code>Shuttle</code>. 1, 3, 4, and 5 are incorrect based on the above. (OCA Objective 6.6)'),
(37, '2015-04-25 13:03:07', 1, 3, NULL, 'Given that the <code>for</code> loop''s syntax is correct, and given:\r\n<code>\r\nimport static java.lang.System.*;\r\nclass _ {\r\n  static public void main(String[] __A_V_) {\r\n    String $ = "";\r\n    for(int x=0; ++x < __A_V_.length; )  // for loop\r\n      $ += __A_V_[x];\r\n    out.println($);\r\n  }\r\n}\r\n</code>\r\nAnd the command line:\r\n<code>\r\njava  _ - A .\r\n</code>\r\nWhat is the result?', 3, '-A', 'A.', '-A.', '_A.', '_-A.', 'Compilation fails', 'An exception is thrown at runtime', '', '2', 'This question is using valid (but inappropriate and weird) identifiers, static imports, <code>main()</code>, and pre-incrementing logic. 1, 3, 4, 5, 6, and 7 are incorrect based on the above. (OCA Objective 1.2 and OCA Objectives 1.3, 1.4, and 2.1)'),
(38, '2015-04-25 13:03:41', 1, 3, NULL, 'Given:\r\n<code>\r\n1.   enum Animals {\r\n2.     DOG("woof"), CAT("meow"), FISH("burble");\r\n3.     String sound;\r\n4.     Animal(String s) { sound = s; }\r\n5.   }\r\n6.   class TestEnum {\r\n7.     static Animals a;\r\n8.     public static void main(String[] args) {\r\n9.       System.out.println(a.DOG.sound + " " + a.FISH.sound);\r\n10.   }\r\n11.  }\r\n</code>\r\nWhat is the result?', 4, '<code>woof burble</code>', 'Multiple compilation errors', 'Compilation fails due to an error on line 2', 'Compilation fails due to an error on line 3', 'Compilation fails due to an error on line 4', 'Compilation fails due to an error on line 9', '', '', '1', '<code>enums</code> can have constructors and variables. 2, 3, 4, 5, and 6 are incorrect; these lines all use correct syntax. (OCP Objective 2.5)'),
(39, '2015-04-25 13:04:10', 1, 3, NULL, 'GivenÂ twoÂ files:\r\n<code>\r\n1.Â Â Â packageÂ pkgA;\r\n2.Â Â Â publicÂ classÂ FooÂ {\r\n3.Â Â Â intaÂ aÂ =Â 5;\r\n4.Â Â Â protectedÂ intÂ bÂ =Â 6;\r\n5.Â Â Â publicÂ intÂ cÂ =Â 7;\r\n6.Â Â Â }\r\n</code>\r\n<code>\r\n3.Â Â Â packageÂ pkgB;\r\n4.Â Â Â importÂ pkgA.*;\r\n5.Â Â Â publicÂ classÂ BazÂ {\r\n6.Â Â Â Â Â publicÂ staticÂ voidÂ main(String[]Â args)Â {\r\n7.Â Â Â Â Â Â Â FooÂ fÂ =Â newÂ Foo();\r\n8.Â Â Â Â Â Â Â System.out.print("Â "Â +Â f.a);\r\n9.Â Â Â Â Â Â Â System.out.print("Â "Â +Â f.b);\r\n10.Â Â Â Â Â System.out.println("Â "Â +Â f.c);\r\n11.Â Â Â }\r\n12.Â }\r\n</code>\r\nWhatÂ isÂ theÂ result?Â (ChooseÂ allÂ thatÂ apply.)', 5, '<code>5 6 7</code>', '<code>5</code> followed by an exception', 'Compilation fails with an error on line 7', 'Compilation fails with an error on line 8', 'Compilation fails with an error on line 9', 'Compilation fails with an error on line 10', '', '', '4,5', 'Variable <code>a</code> has default access, so it cannot be accessed from outside the package. Variable <code>b</code> has protected access in <code>pkgA</code>. 1, 2, 3, and 6 are incorrect based on the above information. (OCA Objectives 1.4 and 6.6)'),
(40, '2015-04-25 13:04:36', 1, 3, NULL, 'Given:\r\n<code>\r\n1. public class Electronic implements Device\r\n      { public void doIT() { } }\r\n2. \r\n3. abstract class Phone1 extends Electronic { }\r\n4. \r\n5. abstract class Phone2 extends Electronic\r\n      { public void doIT(int x) { } }\r\n6. \r\n7. class Phone3 extends Electronic implements Device\r\n      { public void doStuff() { } }\r\n8. \r\n9. interface Device { public void doIt(); }\r\n</code>\r\nWhat is the result? (Choose all that apply.)', 6, 'Compilation succeeds', 'Compilation fails with an error on line 1', 'Compilation fails with an error on line 3', 'Compilation fails with an error on line 5', 'Compilation fails with an error on line 7', 'Compilation fails with an error on line 9', '', '', '1', 'All of these are legal declarations. 2, 3, 4, 5, and 6 are incorrect based on the above information. (OCA Objective 7.6). 2, 3, 4, 5, and 6 are incorrect based on the above information. (OCA Objective 7.6)'),
(41, '2015-04-25 13:05:09', 1, 3, NULL, 'Given:\r\n<code>\r\n4.   class  Announce {\r\n5.     public static void main(String[] args) {\r\n6.       for(int __x = 0; __x < 3; __x++) ;\r\n7.       int #lb = 7;\r\n8.       long [] x [5];\r\n9.       Boolean []ba[];\r\n10.    }\r\n11.  }\r\n</code>\r\nWhat is the result? (Choose all that apply.)', 7, 'Compilation succeeds', 'Compilation fails with an error on line 6', 'Compilation fails with an error on line 7', 'Compilation fails with an error on line 8', 'Compilation fails with an error on line 9', '', '', '', '3, 4', 'Variable <code>a</code> has default access, so it cannot be accessed from outside the package. Variable <code>b</code> has protected access in <code>pkgA</code>. 1, 2, and 5 are incorrect based on the above. (OCA Objective 2.1)'),
(43, '2015-04-25 13:05:56', 1, 3, NULL, 'Given:\r\n<code>\r\n3.   public class TestDays {\r\n4.     public enum Days { MON, TUE, WED };\r\n5.     public static void main(String[] args) {\r\n6.       for(Days d : Days.values() )\r\n7.         ;\r\n8.       Days [] d2 = Days.values();\r\n9.       System.out.println(d2[2]);\r\n10.   }\r\n11. }\r\n</code>\r\nWhats is the result? (Choose all that apply.)', 8, '<code>TUE</code>', '<code>WED</code>', 'The output is unpredictable', 'Compilation fails due to an error on line 4', 'Compilation fails due to an error on line 6', 'Compilation fails due to an error on line 8', 'Compilation fails due to an error on line 92', '', '2', 'Every <code>enum</code> comes with a <code>static values()</code> method that returns an array of the <code>enum</code>''s values, in the order in which they are declared in the <code>enum</code>. 1, 3, 4, 5, 6, and 7 are incorrect based on the above information. (OCP Objective 2.5)'),
(44, '2015-04-25 13:06:18', 1, 3, NULL, 'Given:\r\n<code>\r\n4.  public class Frodo extends Hobbit\r\n5.    public static void main(String[] args) {\r\n6.      int myGold = 7;\r\n7.      System.out.println(countGold(myGold, 6));\r\n8.    }\r\n9.  }\r\n10. class Hobbit {\r\n11.   int countGold(int x, int y) { return x + y; }\r\n12. }\r\n</code>\r\nWhat is the result?', 9, '<code>13</code>', 'Compilation fails due to multiple errors', 'Compilation fails due to an error on line 6', 'Compilation fails due to an error on line 7', 'Compilation fails due to an error on line 11', '', '', '', '4', 'The <code>countGold()</code> method cant be invoked from a static context. 1, 2, 3, and 5 are incorrect based on the above information. (OCA Objectives 2.5 and 6.2)'),
(45, '2015-04-25 13:06:49', 1, 3, NULL, 'Given:\r\n<code>\r\ninterface Gadget {\r\n  void doStuff();\r\n}\r\nabstract class Electronic {\r\n  void getPower() {System.out.print("plug in "); }\r\n}\r\npublic class Tablet extends Electronic implements Gadget {\r\n  void doStuff() { System.out.print("show book "); }\r\n  public static void main(String[] args) {\r\n    new Tablet().getPower();\r\n    new Tablet().doStuff();\r\n  }\r\n}\r\n</code>\r\nWhich are true? (Choose all that apply.)', 10, 'The <code>class Tablet</code> will NOT compile', 'The interface <code>Gadget</code> will NOT compile', 'The output will be <code>plug in show book</code>', 'The <code>abstract</code> class <code>Electronic</code> will NOT compile', 'The class <code>Tablet</code> CANNOT both extend and implement', '', '', '', '1', 'By default, an interface''s methods are <code>public</code> so the </code>Tablet.doStuff</code> method must be public, too. The rest of the code is valid. 2, 3, 4, and 5 are incorrect based on the above. (OCA Objective 7.6)'),
(46, '2015-04-25 13:10:00', 1, 3, NULL, 'Given that the Integer class is in the java.lang package, and given:\r\n<code>\r\n1. // insert code here\r\n2. class StatTest {\r\n3.   public static void main(String[] args) {\r\n4.     System.out.println(Integer.MAX_VALUE);\r\n5.   }\r\n6. }\r\n</code>\r\nWhich, inserted independently at line 1, compiles? (choose all that apply.)', 11, '<code>import static java.lang;</code>', '<code>import static java.lang.Integer;</code>', '<code>import static java.lang.Integer.*;</code>', '<code>static import java.lang.Integer.*;</code>', '<code>import static java.lang.Integer.MAX_VALUE;;</code>', 'None of the above statements are valid import syntax', '', '', '3,5', '3 and 5 are correct syntax for static imports. Line 4 isn''t making use of <code>static imports</code>, so the code will also compile with none of the imports. 1, 2, 4, and 6 are incorrect based on the above. (OCA Objective 1.4)');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
`ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `date`, `firstName`, `lastName`, `courseID`) VALUES
(1, '2015-04-19 11:19:38', 'Michael', 'O''Donnell', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
