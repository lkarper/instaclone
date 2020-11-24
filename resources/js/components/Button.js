import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    const followUser = (event) => {
        axios.post('/follow/1')
            .then(response => {
                alert(response.data);
            });
    }

    return (
        <>
            <button 
                className="btn btn-primary ml-4"
                onClick={followUser}
            >
                Follow
            </button>
        </>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
