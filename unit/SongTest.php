<?
require_once 'lib/Song.class.php';

// PHPUnit for testing the Song class.
class SongTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider dataLines
	 */
	public function testIsChordLine($line, $isChordLine) {
		$s=new Song();
		$this->assertEquals($s->isChordLine($line), $isChordLine);
	}
	
	public function dataLines() {
		return array(
			array('    C                     Am7', true),
			array('The splendor of the King, clothed in majesty,', false),
			array('                    F2', true),
			array('Let all the earth rejoice, all the earth rejoice.', false),
			array('   C                           Am7', true),
			array('He wraps Himself in light, and darkness tries to hide,', false),
			array('                    F2', true),
			array('And trembles at his voice, trembles at his voice.', false),
			array('', false),
			array('', false),
			array('    C                          G', true),
			array('How great is our God, sing with me,', false),
			array('    Am7                        G', true),
			array('How great is our God, all will see,', false),
			array('    Fmaj7      G            C  Csus C', true),
			array('How great, how great is our God.', false),
			array('', false),
			array('', false),
			array('Age to age He stands, and time is in His hands,', false),
			array('Beginning and the end, beginning and the end.', false),
			array('The Godhead, three in one: Father, Spirit, Son,', false),
			array('The Lion and the Lamb, the Lion and the Lamb.', false),
			array('', false),
			array('', false),
			array('C                   G', true),
			array('Name above all names,', false),
			array('Am7                 G', true),
			array('Worthy of all praise,', false),
			array('   Fmaj7', true),
			array('My heart will sing', false),
			array('    G            C Csus C', true),
			array('How great is our God.', false),
		);
	}
}
?>