import { Box, Typography } from "@mui/material";

const Slogan = () => {
    return (
        <Box
            backgroundColor="#231F20"
            display="flex"
            justifyContent="center"
            alignItems="center"
            sx={{ height: { xl: "56px", md: "49px", xs: "28px" } }}
        >
            <Typography
                variant="subtitle"
                color="white"
                sx={{
                    fontWeight: 600,
                    fontSize: { xl: "1.1rem", md: "0.9rem", xs: "0.55rem" },
                }}
            >
                2000+ curated global designs, Free 48-hour shipping in Regina,
                Secure payments
            </Typography>
        </Box>
    );
};

export default Slogan;
