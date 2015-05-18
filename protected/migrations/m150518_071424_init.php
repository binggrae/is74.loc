<?php

class m150518_071424_init extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{post}}', [
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'content' => 'text NOT NULL',
            'tags' => 'string',
            'status' => 'int NOT NULL DEFAULT 0',
            'create_time' => 'timestamp',
            'update_time' => 'timestamp',
            'author_id' => 'int NOT NULL REFERENCES {{user}}(id)',
        ]);

        $this->createTable('{{comment}}', [
            'id' => 'pk',
            'content' => 'text NOT NULL',
            'status' => 'int NOT NULL DEFAULT 0',
            'create_time' => 'timestamp',
            'author' => 'int NOT NULL REFERENCES {{user}}(id)',
            'email' => 'string',
            'url' => 'string',
            'post_id' => 'int NOT NULL REFERENCES {{post}}(id)',
        ]);

        $this->createTable('{{tag}}', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'frequency' => 'int NOT NULL'
        ]);

        $this->createTable('{{lookup}}', [
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'code' => 'int NOT NULL',
            'type' => 'int NOT NULL',
            'position' => 'int NOT NULL',
        ]);

	}

	public function down()
	{


        $this->dropTable('{{lookup}}');
        $this->dropTable('{{tag}}');
        $this->dropTable('{{comment}}');
        $this->dropTable('{{post}}');


	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}