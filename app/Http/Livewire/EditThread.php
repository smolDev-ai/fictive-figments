<?php

namespace App\Http\Livewire;

use App\Models\Thread;
use Livewire\Component;

class EditThread extends Component
{
    public $editingThread;
    public $thread;
    public $title;
    public $body;
    

    public function mount() {
        $this->title = $this->thread->trimTitle();
        $this->body = $this->thread->body;
    }

    public function cancel() {
        $this->editingThread = false;
        $this->emit('cancelThreadEdit', $this->editingThread);
    }

    public function submitForm() {
        $updatedThread = Thread::FindOrFail($this->thread->id);

            if($updatedThread->type !== NULL) {
                if($updatedThread->type === 'ooc') {
                    $siblingThreadOne = Thread::where('title', 'ic_'. $this->thread->trimTitle())->first();
                    $siblingThreadTwo = Thread::where('title', 'char_'. $this->thread->trimTitle())->first();

                    $updatedSlug = explode(' ', $this->title);
                    $slug = implode('-', $updatedSlug);

                    $finishedSlug = str_replace(array("?","!",",",";"), "", $slug);
                    
                    $updatedThread->update([
                        'title' => $this->thread->type . "_" . $this->title,
                        'slug' => $finishedSlug,
                        'body' => $this->body
                    ]);

                    $siblingThreadOne->update([
                        'title' => $siblingThreadOne->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);

                    $siblingThreadTwo->update([
                        'title' => $siblingThreadTwo->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);

                }

                if($updatedThread->type === 'ic') {
                    $siblingThreadOne = Thread::where('title', 'ooc_'. $this->thread->trimTitle())->first();
                    $siblingThreadTwo = Thread::where('title', 'char_'. $this->thread->trimTitle())->first();
                    
                    $updatedSlug = explode(' ', $this->title);
                    $slug = implode('-', $updatedSlug);

                    $finishedSlug = str_replace(array("?","!",",",";"), "", $slug);
                    
                    $updatedThread->update([
                        'title' => $this->thread->type . "_" . $this->title,
                        'slug' => $finishedSlug,
                        'body' => $this->body
                    ]);

                    $siblingThreadOne->update([
                        'title' => $siblingThreadOne->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);

                    $siblingThreadTwo->update([
                        'title' => $siblingThreadTwo->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);
                }

                if($updatedThread->type === 'char') {
                    $siblingThreadOne = Thread::where('title', 'ooc_'. $this->thread->trimTitle())->first();
                    $siblingThreadTwo = Thread::where('title', 'ic_'. $this->thread->trimTitle())->first();
                    
                    $updatedSlug = explode(' ', $this->title);
                    $slug = implode('-', $updatedSlug);

                    $finishedSlug = str_replace(array("?","!",",",";"), "", $slug);
                    
                    $updatedThread->update([
                        'title' => $this->thread->type . "_" . $this->title,
                        'slug' => $finishedSlug,
                        'body' => $this->body
                    ]);

                    $siblingThreadOne->update([
                        'title' => $siblingThreadOne->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);

                    $siblingThreadTwo->update([
                        'title' => $siblingThreadTwo->type . '_' . $this->title,
                        'slug' => $finishedSlug
                    ]);
                }

            } else {
                $updatedSlug = explode(' ', $this->title);
                $slug = implode('-', $updatedSlug);

                $finishedSlug = str_replace(array("?","!",",",";"), "", $slug);
                
                $updatedThread->update([
                    'title' => $this->title,
                    'slug' => $finishedSlug,
                    'body' => $this->body
                ]);
            }


        \session()->flash('success', 'Thread Updated Successfully!');

        $this->cancel();



    }


    public function render()
    {
        return view('livewire.edit-thread');
    }
}
