import CustomButton from "@/Global_Components/CustomButton";
import Header from "@/Global_Components/Header";
import { Box } from "@mui/material";

const SignatureItemsHeader = ({
    title,
    categoryList,
    currentCollectionID,
    setCurrentCollectionID,
}) => {
    const filteredCollections = [...categoryList].filter(
        (item) => item.collection_name !== "none"
    );
    filteredCollections.unshift({ collection_name: "All", collection_id: -1 });

    return (
        <Box display="flex" flexDirection="column" alignItems="center" mb={6}>
            <Header title={title} />
            <Box display="flex">
                {filteredCollections.map((category, i) => (
                    <CustomButton
                        key={i}
                        text={category.collection_name}
                        sx={{
                            mx: 1,
                            px: { xs: 2, md: 2 },
                            py: 0.75,
                            fontSize: {
                                md: "0.75rem",
                                lg: "0.825rem",
                                xl: "1rem",
                            },
                            fontWeight: "400",
                            backgroundColor:
                                currentCollectionID ===
                                    category.collection_id && "#e1e1e3",
                        }}
                        onClick={() =>
                            setCurrentCollectionID(category.collection_id)
                        }
                    />
                ))}
            </Box>
        </Box>
    );
};

export default SignatureItemsHeader;
