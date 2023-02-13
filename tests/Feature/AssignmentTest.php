<?php
    class AssignmentTest {
        public function test_post_create_assignment() {
            $this->post('/assignment', [
                'title' => 'My great assignment'
            ]);
            $this->assertDatabaseHas('assignment', [
                'title' => 'My great assignment'
            ]);
        }
        public function test_list_page_shows_all_assignments()
        {
            $assignment = Assignment::create([
                'title' => 'My great assignment',
            ]);
            $this->get('/assignments')
                ->assertSee('My great assignment');
        }
    }
