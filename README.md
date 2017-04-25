SlugField
=========

ATK14 form field for entering slugs.

Usage
-----

In a form:

    <?php
    // file: app/forms/articles/create_new_form.php
    class CreateNewForm extends ApplicationForm {

      function set_up(){

        $this->add_field("title", new CharField([
          "label" => "Article title",
          "max_length" => 255,
        ]));

        // ... other article fields

        $this->add_field("slug", new SlugField([
          "label" => "Slug for cool looking url",
          "hint" => "are-you-too-clever-for-success",
          "auto_slugify" => true, // whether to convert automatically something like "Nice Title!" to "nice-title"; default is true
          "max_length" => 128, // default is 64
        ]));
      }
    }

Installation
------------

Just use the Composer:

    cd path/to/your/atk14/project/
    composer require atk14/slug-field dev-master

    ln -s ../../vendor/atk14/slug-field/src/slug_field.php app/fields/slug_field.php

License
-------

SlugField is free software distributed [under the terms of the MIT license](http://www.opensource.org/licenses/mit-license)
