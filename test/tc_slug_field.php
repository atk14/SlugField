<?php
class TcSlugField extends TcBase {

	function test(){
		$this->field = new SlugField(array("required" => false));

		$slug = $this->assertValid(" hello-world ");
		$this->assertEquals("hello-world",$slug);

		$slug = $this->assertValid(" ");
		$this->assertTrue(null===$slug); // null_empty_output

		$slug = $this->assertValid(" Hello Universe ");
		$this->assertEquals("hello-universe",$slug); // auto slugify feature

		$slug = $this->assertValid(" 123 ");
		$this->assertEquals("123",$slug);

		$err_msg = $this->assertInvalid("###");
		$this->assertEquals("Write something like black-cat-white-cat",$err_msg);
	}

	function test_max_length(){
		$field = new SlugField(array());
		$this->assertEquals(64,$field->max_length);

		$field = new SlugField(array("max_length" => 100));
		$this->assertEquals(100,$field->max_length);
	}

	function test_max_length_by_constant(){
		define("SLUG_MAX_LENGTH",200);

		$field = new SlugField(array());
		$this->assertEquals(200,$field->max_length);

		$field = new SlugField(array("max_length" => 100));
		$this->assertEquals(100,$field->max_length);
	}
}
