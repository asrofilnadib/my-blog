<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    /*\App\Models\User::factory()->create([
        'name' => Str::rand(10),
        'email' => Str::random(10).'example.com',
         'password' => Hash::make('password')
    ]);*/

    User::create([
      'name' => 'Asrofil Nadib',
      'username' => 'asrofilnadib',
      'email' => 'asrofil@asrofil.co.id',
      'password' => bcrypt('12345'),
    ]);

    /*User::create([
      'name' => 'Nadib',
      'email' => 'nadib@nadib.co.id',
      'password' => bcrypt('54321'),
    ]);*/

    User::factory(5)->create();

    Category::create([
      'name' => 'Programming',
      'slug' => 'programming',
    ]);

    Category::create([
      'name' => 'Web Development',
      'slug' => 'web-development',
    ]);

    Category::create([
      'name' => 'Personal',
      'slug' => 'personal',
    ]);

    Category::create([
      'name' => 'Laravel Development',
      'slug' => 'laravel-development',
    ]);

    Post::factory(21)->create();

    /*Post::create([
      'title' => 'Judul Pertama',
      'slug' => 'judul_pertama',
      'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati, praesentium quo quos rerum sit tenetur unde voluptatibus? Beatae commodi ea ex fugit in, incidunt ipsam iste iusto molestias mollitia nostrum porro.',
      'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati, praesentium quo quos rerum sit tenetur unde voluptatibus? Beatae commodi ea ex fugit in, incidunt ipsam iste iusto molestias mollitia nostrum porro, qui quidem ratione repellendus sapiente soluta tempora vitae voluptate voluptatibus! Aliquam incidunt iure necessitatibus perspiciatis totam voluptatum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus deleniti dolores est eum hic inventore laudantium nisi porro sit. Aspernatur assumenda consequuntur cum deleniti doloremque dolores error et hic id ipsa magni natus numquam odio officiis praesentium, quasi saepe sapiente sunt suscipit tenetur totam veniam, voluptates! Aspernatur autem commodi doloribus dolorum eius eligendi esse et, impedit, nesciunt numquam, officiis tenetur. Blanditiis fugit magni minus mollitia nihil omnis rem temporibus. Asperiores aut beatae debitis non quia reiciendis velit vero voluptate voluptates.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi consequatur consequuntur eligendi explicabo in officiis quasi sunt suscipit. A accusantium assumenda deleniti dolore eos eveniet ex expedita explicabo ipsa iste labore magni mollitia necessitatibus numquam, optio provident quisquam repellat saepe temporibus veniam. Ipsa magnam maxime modi quasi sed? Ad distinctio fugit, id qui quod sint tempora. Alias aperiam aspernatur cupiditate deleniti dolorem eligendi exercitationem id illo impedit ipsum magni modi pariatur possimus quae quas quasi quod quos, similique soluta sunt, tempora temporibus unde veniam. Aliquid at aut autem deleniti dolorum ex expedita ipsa ipsum iste laboriosam magnam maxime nihil, non praesentium quis quos, repellendus tempora tenetur ullam vel veniam.</p>",
      'category_id' => 1,
      'user_id' => 1,
    ]);

    Post::create([
      'title' => 'Judul Kedua',
      'slug' => 'judul_kedua',
      'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati.',
      'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati, praesentium quo quos rerum sit tenetur unde voluptatibus? Beatae commodi ea ex fugit in, incidunt ipsam iste iusto molestias mollitia nostrum porro, qui quidem ratione repellendus sapiente soluta tempora vitae voluptate voluptatibus! Aliquam incidunt iure necessitatibus perspiciatis totam voluptatum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus assumenda culpa deleniti dolores ducimus eaque eius error exercitationem expedita fugiat harum illo ipsa laudantium magni mollitia necessitatibus nisi odio optio porro praesentium quidem quo rem repellendus rerum saepe, tenetur ullam velit. Eligendi expedita harum tempore.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi consequatur consequuntur eligendi explicabo in officiis quasi sunt suscipit. A accusantium assumenda deleniti dolore eos eveniet ex expedita explicabo ipsa iste labore magni mollitia necessitatibus numquam, optio provident quisquam repellat saepe temporibus veniam. Ipsa magnam maxime modi quasi sed? Ad distinctio fugit, id qui quod sint tempora. Alias aperiam aspernatur cupiditate deleniti dolorem eligendi exercitationem id illo impedit ipsum magni modi pariatur possimus quae quas quasi quod quos, similique soluta sunt, tempora temporibus unde veniam. Aliquid at aut autem deleniti dolorum ex expedita ipsa ipsum iste laboriosam magnam maxime nihil, non praesentium quis quos, repellendus tempora tenetur ullam vel veniam.</p>",
      'category_id' => 2,
      'user_id' => 1,
    ]);

    Post::create([
      'title' => 'Judul Ketiga',
      'slug' => 'judul_ketiga',
      'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati, praesentium quo quos rerum sit tenetur unde voluptatibus? Beatae commodi ea ex fugit in, incidunt ipsam iste iusto molestias mollitia nostrum porrost eum hic inventore laudantium nisi porro sit. Aspernatur assumenda consequuntur cum deleniti doloremque dolores error et hic id ipsa magni natus numquam odio officiis praes.',
      'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A distinctio dolorum incidunt necessitatibus, numquam odio quia? Aspernatur aut dolore, expedita explicabo iure minus molestiae nam nemo neque nostrum becati, praesentium quo quos rerum sit tenetur unde voluptatibus? Beatae commodi ea ex fugit in, incidunt ipsam iste iusto molestias mollitia nostrum porro, qui quidem ratione repellendus sapiente soluta tempora vitae voluptate voluptatibus! Aliquam incidunt iure necessitatibus perspiciatis totam voluptatum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus deleniti dolores est eum hic inventore laudantium nisi porro sit. Aspernatur assumenda consequuntur cum deleniti doloremque dolores error et hic id ipsa magni natus numquam odio officiis praesentium, quasi saepe sapiente sunt suscipit tenetur totam veniam, voluptates! Aspernatur autem commodi doloribus dolorum eius eligendi esse et, impedit, nesciunt numquam, officiis tenetur. Blanditiis fugit magni minus mollitia nihil omnis rem temporibus. Asperiores aut beatae debitis non quia reiciendis velit vero voluptate voluptates.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At aut commodi consequatur consequuntur eligendi explicabo in officiis quasi sunt suscipit. A accusantium assumenda deleniti dolore eos eveniet ex expedita explicabo ipsa iste labore magni mollitia necessitatibus numquam, optio provident quisquam repellat saepe temporibus veniam. Ipsa magnam maxime modi quasi sed? Ad distinctio fugit, id qui quod sint tempora. Alias aperiam aspernatur cupiditate deleniti dolorem eligendi exercitationem id illo impedit ipsum magni modi pariatur possimus quae quas quasi quod quos, similique soluta sunt, tempora temporibus unde veniam. Aliquid at aut autem deleniti dolorum ex expedita ipsa ipsum iste laboriosam magnam maxime nihil, non praesentium quis quos, repellendus tempora tenetur ullam vel veniam.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam, aperiam aspernatur ea earum, eos esse eveniet exercitationem facere in, ipsum itaque mollitia nesciunt praesentium quo reprehenderit sit sunt veritatis? Assumenda culpa eveniet laudantium omnis, porro recusandae.</p>",
      'category_id' => 2,
      'user_id' => 2,
    ]);
  }*/
  }
}
