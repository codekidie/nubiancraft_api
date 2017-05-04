<?php
class Controller_Joborder extends Controller_Template
{

	public function action_index()
	{
		$data['joborders'] = Model_Joborder::find('all');
		$this->template->title = "Joborders";
		$this->template->content = View::forge('joborder/index', $data);

	}


	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('joborder');

		if ( ! $data['joborder'] = Model_Joborder::find($id))
		{
			Session::set_flash('error', 'Could not find joborder #'.$id);
			Response::redirect('joborder');
		}

		$this->template->title = "Joborder";
		$this->template->content = View::forge('joborder/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Joborder::validate('create');

			if ($val->run())
			{
				$joborder = Model_Joborder::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'date_schedule' => Input::post('date_schedule'),
					'amount' => Input::post('amount'),
					'description' => Input::post('description'),
					'deposit' => Input::post('deposit'),
					'balance' => Input::post('balance'),
					'conform' => Input::post('conform'),
					'recievedby' => Input::post('recievedby'),
					'claimedby' => Input::post('claimedby'),
				));

				if ($joborder and $joborder->save())
				{
					Session::set_flash('success', 'Added joborder #'.$joborder->id.'.');

					Response::redirect('joborder');
				}

				else
				{
					Session::set_flash('error', 'Could not save joborder.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Joborders";
		$this->template->content = View::forge('joborder/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('joborder');

		if ( ! $joborder = Model_Joborder::find($id))
		{
			Session::set_flash('error', 'Could not find joborder #'.$id);
			Response::redirect('joborder');
		}

		$val = Model_Joborder::validate('edit');

		if ($val->run())
		{
			$joborder->name = Input::post('name');
			$joborder->address = Input::post('address');
			$joborder->date = Input::post('date');
			$joborder->amount = Input::post('amount');
			$joborder->description = Input::post('description');
			$joborder->deposit = Input::post('deposit');
			$joborder->balance = Input::post('balance');
			$joborder->conform = Input::post('conform');
			$joborder->recievedby = Input::post('recievedby');
			$joborder->claimedby = Input::post('claimedby');

			if ($joborder->save())
			{
				Session::set_flash('success', 'Updated joborder #' . $id);

				Response::redirect('joborder');
			}

			else
			{
				Session::set_flash('error', 'Could not update joborder #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$joborder->name = $val->validated('name');
				$joborder->address = $val->validated('address');
				$joborder->date = $val->validated('date');
				$joborder->amount = $val->validated('amount');
				$joborder->description = $val->validated('description');
				$joborder->deposit = $val->validated('deposit');
				$joborder->balance = $val->validated('balance');
				$joborder->conform = $val->validated('conform');
				$joborder->recievedby = $val->validated('recievedby');
				$joborder->claimedby = $val->validated('claimedby');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('joborder', $joborder, false);
		}

		$this->template->title = "Joborders";
		$this->template->content = View::forge('joborder/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('joborder');

		if ($joborder = Model_Joborder::find($id))
		{
			$joborder->delete();

			Session::set_flash('success', 'Deleted joborder #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete joborder #'.$id);
		}

		Response::redirect('joborder');

	}

}
