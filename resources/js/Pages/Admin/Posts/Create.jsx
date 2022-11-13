import {React, useState} from 'react';
import { Inertia } from "@inertiajs/inertia";

const Create = (props) => {
    //state
    const [formData, setFormData] = useState({
        id : props.id,
        title: '',
        content: '',
    });


    const handleSubmit = (event) => {
        event.preventDefault();

        Inertia.post('preview', formData);

    }

    const handleChange = (event) => {
        setFormData({...formData, [event.target.name]: event.target.value});
    }
    return (
        <div className='form-group'>
            <form action="post" onSubmit={handleSubmit}  >
                <input type="hidden" value={props.id} />
                <div>
                    <label htmlFor="title">Title</label>
                    <br />
                    <input type="text" name="title" required onChange={handleChange}  />
                </div>
                <br />
                <div>
                    <label htmlFor="content">Content</label>
                    <br />
                    <input type="text" name="content"  onChange={handleChange} />
                </div>
                <br />

                <button type='submit'>Submit</button>
            </form>
        </div>
    );
}

export default Create;
