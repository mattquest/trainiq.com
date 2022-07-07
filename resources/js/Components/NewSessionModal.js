import { Autocomplete, Box, Modal, TextField, Typography } from '@mui/material';

const modal_box_style = {
    position: 'absolute',
    top: '50%',
    left: '50%',
    transform: 'translate(-50%, -50%)',
    width: 400,
    bgcolor: 'background.paper',
    border: '2px solid #000',
    boxShadow: 24,
    p: 4,
};
const modal_title_style = {
    marginBottom: 2,
}

export default function NewSessionModal(props) {
    return (
        <Modal
            open={props.isOpen}
            onClose={props.onClose}
            aria-labelledby="modal-modal-title"
            aria-describedby="modal-modal-description"
        >
            <Box sx={modal_box_style}>
                <Typography sx={modal_title_style} className="" id="modal-modal-title" variant="h6" component="h2">
                    Log New Session 223
                </Typography>
                <Autocomplete
                    size='small'
                    disablePortal
                    id="combo-box-demo"
                    options={props.movements}
                    sx={{ width: 300 }}
                    renderInput={(params) => <TextField {...params} label="Movement" />}
                />
            </Box>
        </Modal>
    )
}