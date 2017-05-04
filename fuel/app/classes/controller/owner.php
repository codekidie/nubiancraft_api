<?php
class Controller_Owner extends Controller_Template
{

	public function action_index()
	{
		$data['owners'] = Model_Owner::find('all');
		$this->template->title = "Owners";
		$this->template->content = View::forge('owner/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('owner');

		if ( ! $data['owner'] = Model_Owner::find($id))
		{
			Session::set_flash('error', 'Could not find owner #'.$id);
			Response::redirect('owner');
		}

		$this->template->title = "Owner";
		$this->template->content = View::forge('owner/view', $data);

	}


	public function action_login()
	{

		$username = Input::post('username');
		$password = sha1(Input::post('password'));

		$result = DB::select('*')->from('owners')
		->where('username',$username)
		->and_where('password',$password)->as_object()->execute();
		$num_rows = count($result);
		
		if ($num_rows == 1) {
			$data['exist'] = 1;
		}else{
			$data['exist'] = 0;
		}
		$this->template->title = "Owner";
		$this->template->content = View::forge('owner/login', $data);
	}


	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Owner::validate('create');

			if ($val->run())
			{
				$owner = Model_Owner::forge(array(
					'firstname' => Input::post('firstname'),
					'lastname' => Input::post('lastname'),
					'phone' => Input::post('phone'),
					'username' => Input::post('username'),
					'password' => sha1(Input::post('password')),
				));

				if ($owner and $owner->save())
				{
					Session::set_flash('success', 'Added owner #'.$owner->id.'.');

					Response::redirect('owner');
				}

				else
				{
					Session::set_flash('error', 'Could not save owner.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Owners";
		$this->template->content = View::forge('owner/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('owner');

		if ( ! $owner = Model_Owner::find($id))
		{
			Session::set_flash('error', 'Could not find owner #'.$id);
			Response::redirect('owner');
		}

		$val = Model_Owner::validate('edit');

		if ($val->run())
		{
			$owner->firstname = Input::post('firstname');
			$owner->lastname = Input::post('lastname');
			$owner->phone = Input::post('phone');
			$owner->username = Input::post('username');
			$owner->password = Input::post('password');

			if ($owner->save())
			{
				Session::set_flash('success', 'Updated owner #' . $id);

				Response::redirect('owner');
			}

			else
			{
				Session::set_flash('error', 'Could not update owner #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$owner->firstname = $val->validated('firstname');
				$owner->lastname = $val->validated('lastname');
				$owner->phone = $val->validated('phone');
				$owner->username = $val->validated('username');
				$owner->password = $val->validated('password');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('owner', $owner, false);
		}

		$this->template->title = "Owners";
		$this->template->content = View::forge('owner/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('owner');

		if ($owner = Model_Owner::find($id))
		{
			$owner->delete();

			Session::set_flash('success', 'Deleted owner #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete owner #'.$id);
		}

		Response::redirect('owner');

	}

}
