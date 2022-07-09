import { Autocomplete, Box, Button, Dialog, DialogActions, DialogContent, DialogContentText, DialogTitle, Modal, TextField, Typography } from "@mui/material";
import { AdapterDateFns } from "@mui/x-date-pickers/AdapterDateFns";
import { LocalizationProvider } from "@mui/x-date-pickers";
import { DatePicker } from "@mui/x-date-pickers/DatePicker";
import { useState } from "react";
import * as React from "react";

const modal_box_style = {
  position: "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  width: 400,
  bgcolor: "background.paper",
  border: "2px solid #000",
  boxShadow: 24,
  p: 4,
};
const modal_title_style = {
  marginBottom: 2,
};

type Props = {
  onClose: () => void,
  isOpen: boolean,
  movements: any,
}

export default function NewSessionModal(props: Props) {
  const [value, setValue] = useState(null);
  return (

    <Dialog open={props.isOpen} onClose={props.onClose}>
    <DialogTitle>New Session</DialogTitle>
    <DialogContent>
      <DialogContentText>
        Creates a new session.  To add to an existing session close
        this box and select a session.
      </DialogContentText>
      <LocalizationProvider dateAdapter={AdapterDateFns}>
          <DatePicker
            label="Basic example"
            value={value}
            onChange={(newValue) => {
              setValue(newValue);
            }}
            renderInput={(params) => <TextField {...params} />}
          />
        </LocalizationProvider>
        <Autocomplete
          size="small"
          disablePortal
          id="combo-box-demo"
          options={props.movements}
          sx={{ width: 300 }}
          renderInput={(params) => <TextField {...params} label="Movement" />}
        />
    </DialogContent>
    <DialogActions>
      <Button onClick={props.onClose}>Cancel</Button>
      <Button onClick={props.onClose}>Enter</Button>
    </DialogActions>
  </Dialog>

  );
}
