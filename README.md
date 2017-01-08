Add the following lines in the file "RegistrationFormType.php" in vendor/friendsofsymfony/user-bundle/Form/Type/ in buildForm() function:


->add('family', null, array('label' => 'Famille', 'translation_domain' => 'FOSUserBundle'))
            ->add('age', null, array('label' => 'Age', 'translation_domain' => 'FOSUserBundle'))
            ->add('breed', null, array('label' => 'Breed', 'translation_domain' => 'FOSUserBundle'))
            ->add('food', null, array('label' => 'Food', 'translation_domain' => 'FOSUserBundle'))
            ->add('cropNumber', null, array('label' => 'CropNumber', 'translation_domain' => 'FOSUserBundle'))