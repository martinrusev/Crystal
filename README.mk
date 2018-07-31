## Crystal at a glance 

The purpose of this document is to give you quick look over the most important technical specifications and features you will find in Crystal.
 If you need to know more dive in the detailed documentation or read the tutorials.
 
First of all I want to start with the idea that pushed me to create Crystal. After working several years with PHP I found out
something disturbing - database interaction in web applications takes a lot of time and still there aren't so many ORM 
or even simple database layers. Even if you manage to find one - it probably doesn't have good documentation or it requires
PDO or you need to check the docs very often, because the code is not that simple. That's why I decided to build a little
library trying to solve this problems. 
So Crystal is build around these three core principles: 


1. **Well documented** -  every feature in Crystal is documented and complemented with examples 


2. **Readable** - Crystal is human readable and follows the SQL way of saying things to the database 


3. **Portable** - Crystal plays well on shared hostings. It doesn't require PDO to run. 


I think you've got the idea, now let's write some code with Crystal.

## CRUD /Create, read, update, delete/ operations

Let's assume that you have a website with several sections. The site is written with Framework X and you have company blog in Wordpress. You need to show your latest posts on your home page. How can you do this? If you have Crystal installed on your server this operation will take no more than 5 lines of code. 
First we add your database configuration in /path/to/Crystal/config/config.php
After that you can access Crystal by assigning it to a variable:

	$db = Crystal::db();

And now you can access your posts from the Wordpress database with this command:

	$posts = $db->get('posts')->fetch_all();

If you need specific columns, for example date and title:

	$posts = $db->select(array('date','title'))->from('posts')->fetch_all();

Or if you need your posts ordered by date:

	$posts = $db->get('posts')->order_by('date','asc')->fetch_all();

As you can see Crystal follows SQL logical conventions. Let's take a quick look at the insert, update, delete operations. 
In Crystal these operations are called exactly the same as in their SQL variant.

	$data = array('title' => 'My first post', 'content' => 'Lorem ipsum text');
	$db->insert('posts', $data)->execute();
	
Or if we want to update an existing post:

	$db->update('posts',$data)->where('post_id,'1')->execute();
	
We can delete this post by writing:
	
	$db->delete('posts')->where('post_id,'1')->execute();



## Database manipulation

You've just created a very cool php application and the last thing you must do before showing your work to the world is 
creating install script. The real problem here is that some guys are using their own servers at home, other people use 
shared hosting and you can't be sure at all. This is where Crystal can help you. It is one of the few libraries out 
there that doesn't use PDO at all. And that's because Crystal is written with the maximum compability idea in mind. 
So let's begin with our install script. Let's assume that your application is blog engine and it will have posts. 
First step - we load Crystal's manipulation class like this:

	$manipulation = Crystal::manipulation();



Now we can create the database and the tables for our application:

	$manipulation->create_database('blog')->execute();<br/>
	$fields = array('id' => array('type' => 'int', 'auto_increment' => TRUE, 'unsigned' => TRUE, 'primary_key' => TRUE),<br/>
	                'title' => array('type' => 'varchar', 'constraint' => '128'),<br/>
	                'content' => array('type' => 'text')     <br/>
	                );<br/><br/>
	$table_options = array('engine' => 'MYISAM', 'char_set' => 'utf8','collation' => 'utf8_general_ci');
  
	$manipulation->create_table('posts', $table_options)->with_fields($fields)->execute();	


And that's all the code you need for your installation script.

## Data validation

In most cases we validate the data for our application just before we send it to the database.
 And beside that javascript validation is just not enough. That's why Crystal has data validation class.
  It works like this:



	$data = array

	'username' => 'john',
	'email' => 'john_doe@yahoo.com'
	);
	
	$rules = array
	(
	'username' => array('required'),
	'email' => array('valid_email | required')
	)
	
	$validation = Crystal::validation($rules, $data);
	
	
	if($validation->passed == TRUE)
	{
	    echo "No errors";
	}
	else
	{
	    print_r($validation->errors);
	}
