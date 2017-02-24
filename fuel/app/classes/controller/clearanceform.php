<?php
class Controller_Clearanceform extends Controller_Template
{

	public function action_index()
	{
		$data['clearanceforms'] = Model_Clearanceform::find('all');
		$this->template->title = "Clearanceforms";
		$this->template->content = View::forge('clearanceform/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('clearanceform');

		if ( ! $data['clearanceform'] = Model_Clearanceform::find($id))
		{
			Session::set_flash('error', 'Could not find clearanceform #'.$id);
			Response::redirect('clearanceform');
		}

		$this->template->title = "Clearanceform";
		$this->template->content = View::forge('clearanceform/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Clearanceform::validate('create');

			if ($val->run())
			{
				$clearanceform = Model_Clearanceform::forge(array(
					'fileno' => Input::post('fileno'),
					'orno' => Input::post('orno'),
					'firstname' => Input::post('firstname'),
					'middlename' => Input::post('middlename'),
					'lastname' => Input::post('lastname'),
					'address' => Input::post('address'),
					'sex' => Input::post('sex'),
					'civilstatus' => Input::post('civilstatus'),
					'dateofbirth' => Input::post('dateofbirth'),
					'placeofbirth' => Input::post('placeofbirth'),
					'comtaxno' => Input::post('comtaxno'),
					'issuedat' => Input::post('issuedat'),
					'issuedon' => Input::post('issuedon'),
					'purpose' => Input::post('purpose'),
					'contactnumber' => Input::post('contactnumber'),
				));

				if ($clearanceform and $clearanceform->save())
				{
					Session::set_flash('success', 'Added clearanceform #'.$clearanceform->id.'.');

					Response::redirect('clearanceform');
				}

				else
				{
					Session::set_flash('error', 'Could not save clearanceform.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Clearanceforms";
		$this->template->content = View::forge('clearanceform/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('clearanceform');

		if ( ! $clearanceform = Model_Clearanceform::find($id))
		{
			Session::set_flash('error', 'Could not find clearanceform #'.$id);
			Response::redirect('clearanceform');
		}

		$val = Model_Clearanceform::validate('edit');

		if ($val->run())
		{
			$clearanceform->fileno = Input::post('fileno');
			$clearanceform->orno = Input::post('orno');
			$clearanceform->firstname = Input::post('firstname');
			$clearanceform->middlename = Input::post('middlename');
			$clearanceform->lastname = Input::post('lastname');
			$clearanceform->address = Input::post('address');
			$clearanceform->sex = Input::post('sex');
			$clearanceform->civilstatus = Input::post('civilstatus');
			$clearanceform->dateofbirth = Input::post('dateofbirth');
			$clearanceform->placeofbirth = Input::post('placeofbirth');
			$clearanceform->comtaxno = Input::post('comtaxno');
			$clearanceform->issuedat = Input::post('issuedat');
			$clearanceform->issuedon = Input::post('issuedon');
			$clearanceform->purpose = Input::post('purpose');
			$clearanceform->contactnumber = Input::post('contactnumber');

			if ($clearanceform->save())
			{
				Session::set_flash('success', 'Updated clearanceform #' . $id);

				Response::redirect('clearanceform');
			}

			else
			{
				Session::set_flash('error', 'Could not update clearanceform #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$clearanceform->fileno = $val->validated('fileno');
				$clearanceform->orno = $val->validated('orno');
				$clearanceform->firstname = $val->validated('firstname');
				$clearanceform->middlename = $val->validated('middlename');
				$clearanceform->lastname = $val->validated('lastname');
				$clearanceform->address = $val->validated('address');
				$clearanceform->sex = $val->validated('sex');
				$clearanceform->civilstatus = $val->validated('civilstatus');
				$clearanceform->dateofbirth = $val->validated('dateofbirth');
				$clearanceform->placeofbirth = $val->validated('placeofbirth');
				$clearanceform->comtaxno = $val->validated('comtaxno');
				$clearanceform->issuedat = $val->validated('issuedat');
				$clearanceform->issuedon = $val->validated('issuedon');
				$clearanceform->purpose = $val->validated('purpose');
				$clearanceform->contactnumber = $val->validated('contactnumber');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('clearanceform', $clearanceform, false);
		}

		$this->template->title = "Clearanceforms";
		$this->template->content = View::forge('clearanceform/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('clearanceform');

		if ($clearanceform = Model_Clearanceform::find($id))
		{
			$clearanceform->delete();

			Session::set_flash('success', 'Deleted clearanceform #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete clearanceform #'.$id);
		}

		Response::redirect('clearanceform');

	}

}
