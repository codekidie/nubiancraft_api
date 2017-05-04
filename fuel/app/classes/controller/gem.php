<?php
class Controller_Gem extends Controller_Template
{

	public function action_index()
	{
		$data['gems'] = Model_Gem::find('all');
		$this->template->title = "Gems";
		$this->template->content = View::forge('gem/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('gem');

		if ( ! $data['gem'] = Model_Gem::find($id))
		{
			Session::set_flash('error', 'Could not find gem #'.$id);
			Response::redirect('gem');
		}

		$this->template->title = "Gem";
		$this->template->content = View::forge('gem/view', $data);

	}

	public function get_gems($size)
	{
		$sizes = explode("-", $size);
		$currentsize = $sizes[0];
		$gem = DB::select()->from('gems');

		for ($i=0; $sizes[0] < $sizes[1] ; $i++) { 
			if ($i != 0) {
			    $currentsize = $sizes[0]+=0.01;
			  	if ($currentsize >= 1) {
			  	  $currentsize .=".00";
			  	}
				$alteredsize = $currentsize."Ct";
				$gem->or_where('size', '=', $alteredsize);
			 

			}else{
			   $currentsize;
			   $gem->where('size', '=', $currentsize);
			   $currentsize = $sizes[0]+=0.01;
			}

		}

		$data['gem'] = $gem->as_object()->execute();
		
		$this->template->title = "Metals";
		$this->template->content = View::forge('gem/selection', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Gem::validate('create');

			if ($val->run())
			{
				$gem = Model_Gem::forge(array(
					'name' => Input::post('name'),
					'price' => Input::post('price'),
					'size' => Input::post('size'),
				));

				if ($gem and $gem->save())
				{
					Session::set_flash('success', 'Added gem #'.$gem->id.'.');

					Response::redirect('gem');
				}

				else
				{
					Session::set_flash('error', 'Could not save gem.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Gems";
		$this->template->content = View::forge('gem/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('gem');

		if ( ! $gem = Model_Gem::find($id))
		{
			Session::set_flash('error', 'Could not find gem #'.$id);
			Response::redirect('gem');
		}

		$val = Model_Gem::validate('edit');

		if ($val->run())
		{
			$gem->name = Input::post('name');
			$gem->price = Input::post('price');
			$gem->size = Input::post('size');

			if ($gem->save())
			{
				Session::set_flash('success', 'Updated gem #' . $id);

				Response::redirect('gem');
			}

			else
			{
				Session::set_flash('error', 'Could not update gem #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$gem->name = $val->validated('name');
				$gem->price = $val->validated('price');
				$gem->size = $val->validated('size');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('gem', $gem, false);
		}

		$this->template->title = "Gems";
		$this->template->content = View::forge('gem/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('gem');

		if ($gem = Model_Gem::find($id))
		{
			$gem->delete();

			Session::set_flash('success', 'Deleted gem #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete gem #'.$id);
		}

		Response::redirect('gem');

	}

}
